<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Schedule;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.support-ticket.index');
    }

    /**
     * this function is use for get the Contact us or search
     *
     * @param  mixed $request
     * @return json
     */
    public function search(Request $request)
    {
        if ($request->ajax()) {


            $currentPage = ($request->start == 0) ? 1 : (($request->start / $request->length) + 1);

            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });

            $startNo = ($request->start == 0) ? 1 : (($request->length) * ($currentPage - 1)) + 1;

            $user = Auth::user();
            $query = Schedule::selectRaw('*,DATE_FORMAT(createdAt,"%d %b, %Y") as scheduleCreatedAt')->where(['userId' => $user->id, 'type' => 'Contact']);

            $orderDir      = $request->order[0]['dir'];
            $orderColumnId = $request->order[0]['column'];
            $orderColumn   = str_replace('"', '', $request->columns[$orderColumnId]['name']);

            if ($request->search['value']) {
                $query->search($request->search['value']);
            }

            $contacts = $query->orderBy($orderColumn, $orderDir)
                ->paginate($request->length)->toArray();

            $contacts['recordsFiltered'] = $contacts['recordsTotal'] = $contacts['total'];


            foreach ($contacts['data'] as $key => $contact) {
                switch ($contact['status']) {
                    case 'Pending':
                        $contactStatus = '<span class="badge bg-pending">Pending</span>';
                        break;
                    case 'InProgress':
                        $contactStatus = '<span class="badge bg-progress">In Progress</span>';
                        break;
                    default:
                        $contactStatus = '<span class="badge bg-completed">Completed</span>';
                        break;
                }

                $contacts['data'][$key]['srNo'] = $key + 1;
                $contacts['data'][$key]['ticketId'] = $contact['ticketId'] ? '#' . $contact['ticketId']  : '-';
                $contacts['data'][$key]['yourName']   = $contact['yourName'] ? $contact['yourName']  : '-';
                $contacts['data'][$key]['description']   = '<span title="'.$contact["description"].'">'.  ($contact['description'] ?  Str::limit($contact['description'], 100, $end = '...')   : '-') .'</span>';
                $contacts['data'][$key]['companyName']   = $contact['companyName'] ? $contact['companyName']  : '-';
                $contacts['data'][$key]['contactNumber']   =  $contact['contactNumber'] ? $contact['contactNumber']  : '-';
                $contacts['data'][$key]['email']   =  $contact['email'] ? $contact['email']  : '-';
                $contacts['data'][$key]['createdAt']   =  $contact['scheduleCreatedAt'];

                $contacts['data'][$key]['status']   =  $contact['status'] ? $contactStatus  : '-';

                if ($contact['status'] == 'Pending') {
                    $contacts['data'][$key]['status'] = $contactStatus ?? '-';
                }
            }

            return response()->json($contacts);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StorePasskey  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $ticketId = rand(100000, 999999);
        $ticket = Schedule::create($request->merge(['userId' => $user->id, 'type' => 'Contact', 'companyName' => $user->companyName, 'ticketId' => $ticketId])->all());
        if ($ticket) {
            return redirect()->back()->with('success', trans('messages.conatct-us.created.success'));
        }
        return redirect()->back()->with('error', trans('messages.conatct-us.created.error'));
    }

}
