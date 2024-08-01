<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\AuditLog;

class AuditLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = AuditLog::getAuditList();
        $lastUpdate = $query['lastUpdate'];
        $user = Auth::user();

        return view('user.audit_log.index', compact('lastUpdate', 'user'));
    }

    /**
     * Search Activity Log.
     *
     * @param Request $request
     *
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

            $query = AuditLog::selectRaw('audit_logs.*, hsms_tools.name, IF(audit_logs.action = "index","List",audit_logs.action) as action, DATE_FORMAT(audit_logs.createdAt,"%b %d, %Y | %h:%i:%s %p") as createdAtFormat, users.email as userEmail, users.userName, CONCAT(users.firstName," ",users.lastName) as fullName')
                ->join('users', 'users.id', 'audit_logs.userId')
                ->leftJoin('hsms_tools', 'hsms_tools.id', 'audit_logs.hsmId');

            if ($user->role == 'business') {
                $query->where('audit_logs.parentId', $user->id);
            } else {
                $query->where('audit_logs.userId', $user->id);
            }

            $orderDir      = $request->order[0]['dir'];
            $orderColumnId = $request->order[0]['column'];
            $orderColumn   = str_replace('"', '', $request->columns[$orderColumnId]['name']);

            $query->where(function ($query) use ($request) {
                if ($request->search['value'] != null) {
                    $query->orWhere('audit_logs.ipAddress', 'like', '%' . $request->search['value'] . '%')
                        ->orWhere('audit_logs.action', 'like', '%' . $request->search['value'] . '%')
                        ->orWhere('users.email', 'like', '%' . $request->search['value'] . '%')
                        ->orWhere('audit_logs.description', 'like', '%' . $request->search['value'] . '%')
                        ->orWhereRaw("DATE_FORMAT(audit_logs.createdAt, '%b %d, %Y | %h:%i:%s %p') like '%{$request->search['value']}%' ");
                }
            });

            $rows = $query->orderBy($orderColumn, $orderDir)
                ->paginate($request->length)->toArray();

            $rows['recordsFiltered'] = $rows['recordsTotal'] = $rows['total'];

            foreach ($rows['data'] as $key => $row) {

                $rows['data'][$key]['sr_no'] = $startNo + $key;

                $userName = $row['userName'] ?? $row['fullName'];
                $rows['data'][$key]['email'] = '<b>' . $userName . '</b><br>' . $row['userEmail'];

                $strength = $row['strength'];
                if ($strength == 'High') {
                    $strengthColor = 'general-color';
                } elseif ($strength == 'Medium') {
                    $strengthColor = 'text-warning';
                } else {
                    $strengthColor = 'text-danger';
                }
                $rows['data'][$key]['strength'] = $strength ? '<span class="' . $strengthColor . '">' . $strength . '</span>' : "-";

                $rows['data'][$key]['url'] = $row['url'] ? '<a href="' . $row['url'] . '" class="general-color" target="__blank">' . $row['url'] . '</a>' : "-";
                $rows['data'][$key]['name'] = $row['name'] ?? "-";
                $rows['data'][$key]['accessMode'] = $row['accessMode'] ?? "-";

                $rows['data'][$key]['createdAtFormat'] = $row['createdAtFormat'];
            }

            return response()->json($rows);
        }
    }
}
