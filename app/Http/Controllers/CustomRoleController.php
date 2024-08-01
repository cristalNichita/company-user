<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Models\OrganizationCustomRoles;
use Illuminate\Pagination\Paginator;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\Products;
use App\Models\UserHsm;
use App\Models\Module;
use App\Models\User;

class CustomRoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('user.custom_roles.index');
    }


    /**
     * Search Custom Roles.
     *
     * @param Request $request
     *
     * @return json
     */
    public function search(Request $request)
    {
        $user = User::getParentUser();

        if ($request->ajax()) {

            $currentPage = ($request->start == 0) ? 1 : (($request->start / $request->length) + 1);

            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });

            $startNo = ($request->start == 0) ? 1 : (($request->length) * ($currentPage - 1)) + 1;

            $query = OrganizationCustomRoles::selectRaw('*')->where(['organizerId' => $user->id]);

            $orderDir      = $request->order[0]['dir'];
            $orderColumnId = $request->order[0]['column'];
            $orderColumn   = str_replace('"', '', $request->columns[$orderColumnId]['name']);

            $query->where(function ($query) use ($request) {
                if ($request->search['value'] != null) {
                    $query->orWhere('roleName', 'like', '%' . $request->search['value'] . '%')
                        ->orWhere('roleDescription', 'like', '%' . $request->search['value'] . '%');
                }
            });

            $rows = $query->orderBy($orderColumn, $orderDir)
                ->paginate($request->length)->toArray();

            $rows['recordsFiltered'] = $rows['recordsTotal'] = $rows['total'];

            foreach ($rows['data'] as $key => $row) {

                $params = [
                    'custom_role' => $row['id'],
                ];

                $rows['data'][$key]['sr_no'] = $startNo + $key;

                $editRoute  = route('custom-roles.edit', $params);

                $authentication = is_array($row['authentication']) ? implode(', ', $row['authentication']) : '';
                $device = is_array($row['device']) ? implode(', ', $row['device']) : '';
                $browser = is_array($row['browser']) ? implode(', ', $row['browser']) : '';

                $permissionRole = '<span class="badge">' . $row['numberPassword'] . ' Passwords</span> <span class="badge">' . $row['numberApplication'] . ' Applications</span> <span class="badge">' . $authentication . ' Applications</span> <span class="badge">' . $device . '</span> <span class="badge">' . $browser . '</span>';

                $rows['data'][$key]['roleName'] = $row['roleName'] ?? "N/A";
                $rows['data'][$key]['roleDescription'] = $row['roleDescription'] ?? "N/A";
                $rows['data'][$key]['permissionData'] = $permissionRole;
                $rows['data'][$key]['action']   = '<div class="dropdown dropstart">
                <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 9.375C16.0355 9.375 16.875 8.53553 16.875 7.5C16.875 6.46447 16.0355 5.625 15 5.625C13.9645 5.625 13.125 6.46447 13.125 7.5C13.125 8.53553 13.9645 9.375 15 9.375Z"
                            fill="#A1FF00" />
                        <path
                            d="M15 16.875C16.0355 16.875 16.875 16.0355 16.875 15C16.875 13.9645 16.0355 13.125 15 13.125C13.9645 13.125 13.125 13.9645 13.125 15C13.125 16.0355 13.9645 16.875 15 16.875Z"
                            fill="#A1FF00" />
                        <path
                            d="M15 24.375C16.0355 24.375 16.875 23.5355 16.875 22.5C16.875 21.4645 16.0355 20.625 15 20.625C13.9645 20.625 13.125 21.4645 13.125 22.5C13.125 23.5355 13.9645 24.375 15 24.375Z"
                            fill="#A1FF00" />
                    </svg>
                </button><ul class="dropdown-menu">';
                $rows['data'][$key]['action']   .= '<li class="dropdown-item">
                                                        <button class="dropdown-item role-delete" data-id=' . $row['id'] . ' type="button" title="Delete Role">
                                                            <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM4.17 9.59C3.98302 9.40302 3.87798 9.14943 3.87798 8.885C3.87798 8.62057 3.98302 8.36698 4.17 8.18C4.35698 7.99302 4.61057 7.88798 4.875 7.88798C5.13943 7.88798 5.39302 7.99302 5.58 8.18L7 9.59L8.41 8.18C8.59698 7.99302 8.85057 7.88798 9.115 7.88798C9.37943 7.88798 9.63302 7.99302 9.82 8.18C10.007 8.36698 10.112 8.62057 10.112 8.885C10.112 9.14943 10.007 9.40302 9.82 9.59L8.41 11L9.82 12.41C9.91258 12.5026 9.98602 12.6125 10.0361 12.7335C10.0862 12.8544 10.112 12.9841 10.112 13.115C10.112 13.2459 10.0862 13.3756 10.0361 13.4965C9.98602 13.6175 9.91258 13.7274 9.82 13.82C9.72742 13.9126 9.61751 13.986 9.49654 14.0361C9.37558 14.0862 9.24593 14.112 9.115 14.112C8.98407 14.112 8.85442 14.0862 8.73346 14.0361C8.61249 13.986 8.50258 13.9126 8.41 13.82L7 12.41L5.59 13.82C5.49742 13.9126 5.38751 13.986 5.26654 14.0361C5.14558 14.0862 5.01593 14.112 4.885 14.112C4.75407 14.112 4.62442 14.0862 4.50346 14.0361C4.38249 13.986 4.27258 13.9126 4.18 13.82C4.08742 13.7274 4.01398 13.6175 3.96387 13.4965C3.91377 13.3756 3.88798 13.2459 3.88798 13.115C3.88798 12.9841 3.91377 12.8544 3.96387 12.7335C4.01398 12.6125 4.08742 12.5026 4.18 12.41L5.59 11L4.17 9.59ZM13 1H10.5L9.79 0.29C9.61 0.11 9.35 0 9.09 0H4.91C4.65 0 4.39 0.11 4.21 0.29L3.5 1H1C0.45 1 0 1.45 0 2C0 2.55 0.45 3 1 3H13C13.55 3 14 2.55 14 2C14 1.45 13.55 1 13 1Z" />
                                                            </svg>
                                                            <span>Delete Role</span>
                                                        </button>
                                                    </li>';
                $rows['data'][$key]['action']   .= '<li class="dropdown-item">
                        <a href="' . $editRoute . '")>
                            <button class="dropdown-item" type="button" title="Edit Role">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.4939 5.43849L13.5317 1.55055L14.528 0.55542C14.8988 0.18514 15.343 0 15.8608 0C16.378 0 16.8142 0.18514 17.1695 0.55542L18.4671 1.87454C18.8224 2.22939 19 2.66139 19 3.17052C19 3.67966 18.8224 4.11165 18.4671 4.4665L17.4939 5.43849ZM1.85366 19C1.3439 19 0.907366 18.8186 0.544049 18.4557C0.181349 18.0934 0 17.6577 0 17.1486V4.18879C0 3.67966 0.181349 3.24365 0.544049 2.88078C0.907366 2.51852 1.3439 2.33739 1.85366 2.33739H10.1256L4.51829 7.93788C4.25569 8.20016 4.05488 8.50101 3.91585 8.84044C3.77683 9.17986 3.70732 9.53471 3.70732 9.90499V13.4458C3.70732 13.9549 3.88898 14.3906 4.25229 14.7529C4.61499 15.1158 5.05122 15.2972 5.56098 15.2972H9.1061C9.47683 15.2972 9.83211 15.2278 10.172 15.0889C10.5118 14.9501 10.813 14.7495 11.0756 14.4872L16.6829 8.86358V17.1486C16.6829 17.6577 16.5016 18.0934 16.1389 18.4557C15.7756 18.8186 15.339 19 14.8293 19H1.85366ZM6.4878 13.4458C6.2252 13.4458 6.00524 13.3572 5.8279 13.1801C5.64995 13.0024 5.56098 12.7824 5.56098 12.5201V10.2753C5.56098 10.0284 5.60732 9.79298 5.7 9.56896C5.79268 9.34556 5.92398 9.149 6.0939 8.97929L12.211 2.86967L16.1732 6.75761L10.0329 12.8904C9.86301 13.0601 9.66621 13.1952 9.44254 13.2958C9.21824 13.3958 8.98252 13.4458 8.73537 13.4458H6.4878Z" />
                                </svg>
                                <span>Edit Role</span>
                            </button></a>
                    </li>';
                $rows['data'][$key]['action']   .= '</ul></div>&nbsp&nbsp';
            }

            return response()->json($rows);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::getParentUser();
        $hsmList = CommonHelper::getAllHsmDevice($user);

        return view('user.custom_roles.create', compact('hsmList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $user = User::getParentUser();

        $storage = [];
        if ($request->hsmStorage) {
            foreach ($request->hsmStorage as $key => $value) {
                // Skip the record if 'storage' is empty or 0
                if (empty($value['storage']) || $value['storage'] == 0) {
                    continue;
                }

                $storage[] = [
                    'id' => $value['id'],
                    'storage' => CommonHelper::formatSizeConvertToBytes($value['storage'], $value['format']),
                    'format' => $value['format']
                ];
            }
        }

        foreach ($storage as $key => $value) {
            // Check if the current storage value is greater than the corresponding available space value
            if ($value['storage'] > $request->availableSpace[$key]) {
                // Redirect with an error message
                return redirect()->back()->with('error', trans('messages.hsm_tool.storage_space'));
            }

            $productId = UserHsm::where(['hsmId' => $value['id'], 'organizerId' => $user->id])->value('productId');
            $product = Products::where('id', $productId)->first();

            if ($request->numberApplication > $product->noOfApplications) {
                return redirect()->back()->with('error', trans('messages.hsm_tool.noOfApplications'));
            }

            if (count($request->device) > $product->noOfDevices) {
                return redirect()->back()->with('error', trans('messages.hsm_tool.noOfDevices'));
            }

            if (count($request->browser) > $product->noOfExtensions) {
                return redirect()->back()->with('error', trans('messages.hsm_tool.noOfExtensions'));
            }
        }

        $customRole = OrganizationCustomRoles::create($request->merge(['organizerId' => $user->id, 'hsmStorage' => $storage])->all());

        if ($customRole) {

            return redirect(route('custom-roles.index'))->with('success', trans('messages.roles.create.success'));
        }
        return redirect(route('custom-roles.index'))->with('error', trans('messages.roles.create.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::getParentUser();
        $roleDetails = OrganizationCustomRoles::where(['id' => $id])->first();

        return view('user.custom_roles.detail', compact('roleDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::getParentUser();
        $modules = Module::where('roleType', 'User')->get();
        $roleDetail = OrganizationCustomRoles::where(['id' => $id])->first();
        $permissionRole = $roleDetail->permission ?? [];

        $hsmList = CommonHelper::getAllHsmDevice($user);
        return view('user.custom_roles.create', compact('roleDetail', 'modules', 'permissionRole', 'hsmList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreRoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoleRequest $request, $id)
    {
        $checboxNameArray = array_keys($request->checkboxName) ?? [];
        $user = User::getParentUser();

        $storage = [];
        if ($request->hsmStorage) {
            foreach ($request->hsmStorage as $key => $value) {

                if (in_array($value['id'], $checboxNameArray)) {
                    $storage[] = [
                        'id' => $value['id'],
                        'storage' => CommonHelper::formatSizeConvertToBytes($value['storage'], $value['format']),
                        'format' => $value['format']
                    ];
                }
            }
        }

        foreach ($storage as $key => $value) {
            // Check if the current storage value is greater than the corresponding available space value
            if ($value['storage'] > $request->availableSpace[$key]) {
                // Redirect with an error message
                return redirect()->back()->with('error', trans('messages.hsm_tool.storage_space'));
            }

            $productId = UserHsm::where(['hsmId' => $value['id'], 'organizerId' => $user->id])->value('productId');
            $product = Products::where('id', $productId)->first();

            if ($request->numberApplication > $product->noOfApplications) {
                return redirect()->back()->with('error', trans('messages.hsm_tool.noOfApplications'));
            }

            if (count($request->device) > $product->noOfDevices) {
                return redirect()->back()->with('error', trans('messages.hsm_tool.noOfDevices'));
            }

            if (count($request->browser) > $product->noOfExtensions) {
                return redirect()->back()->with('error', trans('messages.hsm_tool.noOfExtensions'));
            }
        }

        $customRole = OrganizationCustomRoles::where(['id' => $id, 'organizerId' => $user->id])->first();
        if ($customRole) {

            $customRole->update($request->merge(['hsmStorage' => array_values($storage)])->all());

            $userRole = UserRole::where('roleId', $customRole->id)->get();
            if ($userRole) {
                foreach ($userRole as $key => $role) {
                    UserRole::updateEmployeeRole($customRole->id, $role->userId);
                }
            }

            return redirect(route('custom-roles.index'))->with('success', trans('messages.roles.update.success'));
        }
        return redirect(route('custom-roles.index'))->with('error', trans('messages.roles.update.error'));
    }


    /**
     * This function use for delete the role
     *
     * @param  mixed $request
     * @return void
     */
    public function roleDelete(Request $request)
    {
        $usedRoleCount = UserRole::where('roleId', $request->id)->count();
        if ($usedRoleCount > 0) {
            return redirect()->back()->with('error', trans('messages.roles.already_used'));
        }

        $user = User::getParentUser();
        $delete =   OrganizationCustomRoles::where(['organizerId' => $user->id, 'id' => $request->id])->delete();
        if ($delete) {
            return redirect()->back()->with('success', trans('messages.roles.delete.success'));
        }
        return redirect()->back()->with('error', trans('messages.roles.delete.error'));
    }
}
