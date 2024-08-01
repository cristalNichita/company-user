<?php

namespace App\Http\Controllers;

use App\Models\OrganizationCustomRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\AddMember;
use App\Helpers\HsmCloudHelper;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use App\Models\HsmsTools;
use App\Models\AuditLog;
use App\Models\UserRole;
use App\Models\UserHsm;
use App\Models\User;
use Carbon\Carbon;


class BusinessController extends Controller
{
    /**
     * This function show Members page
     *
     * @return page
     */
    public function index(Request $request)
    {
        $user = User::getParentUser();

        $customRoles = OrganizationCustomRoles::where('organizerId', $user->id)->get();

        return view('user.members.member', compact('customRoles'));
    }


    /**
     * Search Users.
     *
     * @param Request $request
     *
     * @return json
     */
    public function search(Request $request)
    {
        $childUser = Auth::user();
        $user = User::getParentUser();

        if ($request->ajax()) {

            $currentPage = ($request->start == 0) ? 1 : (($request->start / $request->length) + 1);

            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });

            $startNo = ($request->start == 0) ? 1 : (($request->length) * ($currentPage - 1)) + 1;

            $query = User::selectRaw('users.*, DATE_FORMAT(users.lastLogin, "' . config('constant.commonDateYearWithHISAFormat') . '") as lastLoginFormat, DATE_FORMAT(users.createdAt, "' . config('constant.commonDateYearWithHISAFormat') . '") as createdOn, organization_custom_roles.roleName, user_hsm.totalPasswords')
                ->withCount(['userRole'])
                ->groupBy('users.id')
                ->leftJoin('user_roles', 'user_roles.userId', 'users.id')
                ->leftJoin('user_hsm', 'user_hsm.organizerId', 'users.id')
                ->leftJoin('organization_custom_roles', 'organization_custom_roles.id', 'user_roles.roleId')
                ->where(['users.parentId' => $user->id]);

            if ($childUser->role == 'user') {
                $query->where('id', '!=', $childUser->id);
            }

            $orderDir      = $request->order[0]['dir'];
            $orderColumnId = $request->order[0]['column'];
            $orderColumn   = str_replace('"', '', $request->columns[$orderColumnId]['name']);

            $query->where(function ($query) use ($request) {
                if ($request->search['value'] != null) {
                    $query->orWhere('userName', 'like', '%' . $request->search['value'] . '%')
                        ->orWhere('email', 'like', '%' . $request->search['value'] . '%');
                }
            });

            $rows = $query->orderBy($orderColumn, $orderDir)
                ->paginate($request->length)->toArray();

            $rows['recordsFiltered'] = $rows['recordsTotal'] = $rows['total'];

            foreach ($rows['data'] as $key => $row) {

                $params = [
                    'business' => $row['id'],
                ];

                $rows['data'][$key]['sr_no'] = $startNo + $key;

                $viewRoute   = route('business.show', $params);
                $statusRoute = route('business.status', $params);
                $deleteRoute  = route('business.destroy', $params);
                $editRoute  = route('business.edit', $params);
                $editRoleRoute  = route('business.userRoleEdit', $params);

                $createDate = Carbon::parse($row['createdAt']); // now date is a carbon instance
                $createAgo = $createDate->diffForHumans(Carbon::now());

                $loginDate = Carbon::parse($row['lastLogin']); // now date is a carbon instance
                $loginAgo = $loginDate->diffForHumans(Carbon::now());

                $rows['data'][$key]['userName'] = $row['userName'] ? $row['userName'] . '<br />' . $row['roleName'] : '-';
                $rows['data'][$key]['email'] = $row['email'] ?? "N/A";
                $rows['data'][$key]['ipAddress'] = CommonHelper::myIp() ?? "N/A";
                $rows['data'][$key]['createdAt'] = $row['createdOn'] ? $row['createdOn'] . "<br>($createAgo)" : "N/A";
                $rows['data'][$key]['lastLogin'] = $row['lastLoginFormat'] ? $row['lastLoginFormat'] . "<br>($loginAgo)" : "N/A";
                $rows['data'][$key]['totalPasswords'] = '<span class="ms-4">' . ($row['totalPasswords'] ?? 0) . '</span>';
                $rows['data'][$key]['browser'] = $row['browser'];
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
                                                    </button>
                                                    <ul class="dropdown-menu">';

                if ($row['isActive'] == 1) {
                    if ($row['user_role_count'] > 0) {
                        $rows['data'][$key]['action'] .= '<li class="dropdown-item"><a onclick=editRole("' . $editRoleRoute . '")><button class="dropdown-item" type="button" title="Edit User Role">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.4939 5.43849L13.5317 1.55055L14.528 0.55542C14.8988 0.18514 15.343 0 15.8608 0C16.378 0 16.8142 0.18514 17.1695 0.55542L18.4671 1.87454C18.8224 2.22939 19 2.66139 19 3.17052C19 3.67966 18.8224 4.11165 18.4671 4.4665L17.4939 5.43849ZM1.85366 19C1.3439 19 0.907366 18.8186 0.544049 18.4557C0.181349 18.0934 0 17.6577 0 17.1486V4.18879C0 3.67966 0.181349 3.24365 0.544049 2.88078C0.907366 2.51852 1.3439 2.33739 1.85366 2.33739H10.1256L4.51829 7.93788C4.25569 8.20016 4.05488 8.50101 3.91585 8.84044C3.77683 9.17986 3.70732 9.53471 3.70732 9.90499V13.4458C3.70732 13.9549 3.88898 14.3906 4.25229 14.7529C4.61499 15.1158 5.05122 15.2972 5.56098 15.2972H9.1061C9.47683 15.2972 9.83211 15.2278 10.172 15.0889C10.5118 14.9501 10.813 14.7495 11.0756 14.4872L16.6829 8.86358V17.1486C16.6829 17.6577 16.5016 18.0934 16.1389 18.4557C15.7756 18.8186 15.339 19 14.8293 19H1.85366ZM6.4878 13.4458C6.2252 13.4458 6.00524 13.3572 5.8279 13.1801C5.64995 13.0024 5.56098 12.7824 5.56098 12.5201V10.2753C5.56098 10.0284 5.60732 9.79298 5.7 9.56896C5.79268 9.34556 5.92398 9.149 6.0939 8.97929L12.211 2.86967L16.1732 6.75761L10.0329 12.8904C9.86301 13.0601 9.66621 13.1952 9.44254 13.2958C9.21824 13.3958 8.98252 13.4458 8.73537 13.4458H6.4878Z" />
                        </svg>
                        <span>Edit Role</span>
                    </button></a> </li>';
                    } else {

                        $rows['data'][$key]['action'] .= '<li class="dropdown-item"><a onclick=openRolePopup("' . $row['id'] . '")><button class="dropdown-item" type="button" title="Add User Role">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.18112 7.18075L1.18075 7.18112C0.960017 7.40262 0.85 7.67898 0.85 8C0.85 8.32103 0.960028 8.59716 1.18093 8.81807C1.4024 9.03953 1.67881 9.15 2 9.15H6.85V14C6.85 14.3211 6.96039 14.5972 7.18186 14.818C7.40271 15.0396 7.67886 15.15 8 15.15C8.32119 15.15 8.5976 15.0395 8.81907 14.8181C9.03997 14.5972 9.15 14.321 9.15 14V9.15H14C14.3211 9.15 14.5972 9.03961 14.818 8.81814C15.0396 8.59729 15.15 8.32114 15.15 8C15.15 7.67881 15.0395 7.4024 14.8181 7.18093C14.5972 6.96003 14.321 6.85 14 6.85H9.15V2C9.15 1.67898 9.03998 1.40262 8.81925 1.18112L8.81888 1.18075C8.59738 0.960017 8.32102 0.85 8 0.85C7.67897 0.85 7.40284 0.960028 7.18193 1.18093C6.96047 1.4024 6.85 1.67881 6.85 2V6.85H2C1.67898 6.85 1.40262 6.96002 1.18112 7.18075Z"></path>
                        </svg>
                        <span>Add Role</span>
                    </button></a></li>';
                    }
                }

                if (CommonHelper::getUserCustomMultipleRoles('edit', 'members') || (Auth::user()->role == 'business')) {
                    $rows['data'][$key]['action']   .= '<li class="dropdown-item">
                                                            <a onclick=edit("' . $editRoute . '")>
                                                                <button class="dropdown-item" type="button" title="Edit User Role">
                                                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M17.4939 5.43849L13.5317 1.55055L14.528 0.55542C14.8988 0.18514 15.343 0 15.8608 0C16.378 0 16.8142 0.18514 17.1695 0.55542L18.4671 1.87454C18.8224 2.22939 19 2.66139 19 3.17052C19 3.67966 18.8224 4.11165 18.4671 4.4665L17.4939 5.43849ZM1.85366 19C1.3439 19 0.907366 18.8186 0.544049 18.4557C0.181349 18.0934 0 17.6577 0 17.1486V4.18879C0 3.67966 0.181349 3.24365 0.544049 2.88078C0.907366 2.51852 1.3439 2.33739 1.85366 2.33739H10.1256L4.51829 7.93788C4.25569 8.20016 4.05488 8.50101 3.91585 8.84044C3.77683 9.17986 3.70732 9.53471 3.70732 9.90499V13.4458C3.70732 13.9549 3.88898 14.3906 4.25229 14.7529C4.61499 15.1158 5.05122 15.2972 5.56098 15.2972H9.1061C9.47683 15.2972 9.83211 15.2278 10.172 15.0889C10.5118 14.9501 10.813 14.7495 11.0756 14.4872L16.6829 8.86358V17.1486C16.6829 17.6577 16.5016 18.0934 16.1389 18.4557C15.7756 18.8186 15.339 19 14.8293 19H1.85366ZM6.4878 13.4458C6.2252 13.4458 6.00524 13.3572 5.8279 13.1801C5.64995 13.0024 5.56098 12.7824 5.56098 12.5201V10.2753C5.56098 10.0284 5.60732 9.79298 5.7 9.56896C5.79268 9.34556 5.92398 9.149 6.0939 8.97929L12.211 2.86967L16.1732 6.75761L10.0329 12.8904C9.86301 13.0601 9.66621 13.1952 9.44254 13.2958C9.21824 13.3958 8.98252 13.4458 8.73537 13.4458H6.4878Z" />
                                                                    </svg>
                                                                    <span>Edit User</span>
                                                                </button></a>
                                                            </li>';
                }

                if (CommonHelper::getUserCustomMultipleRoles('deleteUser', 'members') || (Auth::user()->role == 'business')) {
                    $rows['data'][$key]['action']   .= '<li class="dropdown-item">
                                                            <button class="dropdown-item user-delete" data-id=' . $row['id'] . ' type="button" title="Delete User">
                                                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM4.17 9.59C3.98302 9.40302 3.87798 9.14943 3.87798 8.885C3.87798 8.62057 3.98302 8.36698 4.17 8.18C4.35698 7.99302 4.61057 7.88798 4.875 7.88798C5.13943 7.88798 5.39302 7.99302 5.58 8.18L7 9.59L8.41 8.18C8.59698 7.99302 8.85057 7.88798 9.115 7.88798C9.37943 7.88798 9.63302 7.99302 9.82 8.18C10.007 8.36698 10.112 8.62057 10.112 8.885C10.112 9.14943 10.007 9.40302 9.82 9.59L8.41 11L9.82 12.41C9.91258 12.5026 9.98602 12.6125 10.0361 12.7335C10.0862 12.8544 10.112 12.9841 10.112 13.115C10.112 13.2459 10.0862 13.3756 10.0361 13.4965C9.98602 13.6175 9.91258 13.7274 9.82 13.82C9.72742 13.9126 9.61751 13.986 9.49654 14.0361C9.37558 14.0862 9.24593 14.112 9.115 14.112C8.98407 14.112 8.85442 14.0862 8.73346 14.0361C8.61249 13.986 8.50258 13.9126 8.41 13.82L7 12.41L5.59 13.82C5.49742 13.9126 5.38751 13.986 5.26654 14.0361C5.14558 14.0862 5.01593 14.112 4.885 14.112C4.75407 14.112 4.62442 14.0862 4.50346 14.0361C4.38249 13.986 4.27258 13.9126 4.18 13.82C4.08742 13.7274 4.01398 13.6175 3.96387 13.4965C3.91377 13.3756 3.88798 13.2459 3.88798 13.115C3.88798 12.9841 3.91377 12.8544 3.96387 12.7335C4.01398 12.6125 4.08742 12.5026 4.18 12.41L5.59 11L4.17 9.59ZM13 1H10.5L9.79 0.29C9.61 0.11 9.35 0 9.09 0H4.91C4.65 0 4.39 0.11 4.21 0.29L3.5 1H1C0.45 1 0 1.45 0 2C0 2.55 0.45 3 1 3H13C13.55 3 14 2.55 14 2C14 1.45 13.55 1 13 1Z" />
                                                                </svg>
                                                                <span>Delete User</span>
                                                            </button>
                                                        </li>';
                }

                if ($row['employeeId']) {
                    $rows['data'][$key]['action']   .= '<li class="dropdown-item">
                                                            <button class="dropdown-item user-uuid" type="button" title="Copy to Clipboard" data-id=' . $row['employeeId'] . '>
                                                                <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M6 16C5.45 16 4.97933 15.8043 4.588 15.413C4.196 15.021 4 14.55 4 14V2C4 1.45 4.196 0.979 4.588 0.587C4.97933 0.195667 5.45 0 6 0H15C15.55 0 16.021 0.195667 16.413 0.587C16.8043 0.979 17 1.45 17 2V14C17 14.55 16.8043 15.021 16.413 15.413C16.021 15.8043 15.55 16 15 16H6ZM2 20C1.45 20 0.979 19.8043 0.587 19.413C0.195667 19.021 0 18.55 0 18V5C0 4.71667 0.0960001 4.479 0.288 4.287C0.479333 4.09567 0.716667 4 1 4C1.28333 4 1.521 4.09567 1.713 4.287C1.90433 4.479 2 4.71667 2 5V18H12C12.2833 18 12.521 18.096 12.713 18.288C12.9043 18.4793 13 18.7167 13 19C13 19.2833 12.9043 19.5207 12.713 19.712C12.521 19.904 12.2833 20 12 20H2Z" fill="white"/>
                                                                </svg>
                                                                <span>Copy UUID</span>
                                                            </button>
                                                        </li>';
                }

                if (CommonHelper::getUserCustomMultipleRoles('show', 'members') || (Auth::user()->role == 'business')) {
                    $rows['data'][$key]['action']   .= '<a href="' . $viewRoute . '">
                                                        <li class="dropdown-item">
                                                            <button class="dropdown-item" type="button" title="User Details" data-id=' . $row['id'] . '>
                                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                                                                    y="0px" viewBox="0 0 59.2 59.2" style="enable-background:new 0 0 59.2 59.2;"
                                                                    xml:space="preserve">
                                                                    <g>
                                                                        <path
                                                                            d="M51.062,21.561c-5.759-5.759-13.416-8.931-21.561-8.931S13.7,15.801,7.941,21.561L0,29.501l8.138,8.138   c5.759,5.759,13.416,8.931,21.561,8.931s15.802-3.171,21.561-8.931l7.941-7.941L51.062,21.561z M49.845,36.225   c-5.381,5.381-12.536,8.345-20.146,8.345s-14.765-2.963-20.146-8.345l-6.724-6.724l6.527-6.527   c5.381-5.381,12.536-8.345,20.146-8.345s14.765,2.963,20.146,8.345l6.724,6.724L49.845,36.225z"
                                                                            fill="#FFF" />
                                                                        <path
                                                                            d="M29.572,16.57c-7.168,0-13,5.832-13,13s5.832,13,13,13s13-5.832,13-13S36.741,16.57,29.572,16.57z M29.572,24.57   c-2.757,0-5,2.243-5,5c0,0.552-0.448,1-1,1s-1-0.448-1-1c0-3.86,3.14-7,7-7c0.552,0,1,0.448,1,1S30.125,24.57,29.572,24.57z"
                                                                            fill="#FFF" />
                                                                    </g>
                                                                </svg>
                                                                <span>User Details</span>
                                                            </button>
                                                        </li>
                                                    </a>';
                }

                $rows['data'][$key]['action']   .= '</ul></div>&nbsp&nbsp';

                if ($row['isActive'] == 2) {
                    $rows['data'][$key]['isActive'] = '<span class="text-warning">Invited</span>';
                } else {
                    $status = ($row['isActive'] == 1) ? 'checked' : '';
                    $statusName = ($row['isActive'] == 1) ? 'Active' : 'Inactive';
                    $rows['data'][$key]['isActive'] = '<div class="form-check form-switch">
                    <input class="form-check-input btnChangeStatus" name="isActive" type="checkbox" role="switch" data-url="' . $statusRoute . '"  ' . $status . '  id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">&nbsp;' . $statusName . '</label>
                  </div>';
                }
            }

            return response()->json($rows);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userRoleEdit($id)
    {
        if ($id) {
            $editRole = UserRole::where('userId', $id)->get();
            $editEmployee = User::where('id', $id)->first();
            $result = ['editEmployee' => $editEmployee, 'editRole' => $editRole, 'userId' => $id];
            return $this->toJson($result, trans(), 1);
        }
        return redirect()->back()->with('error', trans('messages.msg.not_found', ['module' => 'user']));
    }


    /**
     * Update the Role permission.
     *
     * @param  \Illuminate\Http\Request  $request
     **/
    public function addUpdateRole(Request $request)
    {
        UserRole::createAdminEmployeeRole($request->userRole, $request->id);
        return redirect()->back()->with('success', trans('messages.roles.update.success'));
    }



    /**
     * This function use for change the member status
     *
     * @param  mixed $request
     * @return void
     */
    public function changeMemberStatus($id)
    {
        $row = User::where(['id' => $id])->first();

        if (empty($row)) {
            return $this->toJson([], trans('messages.msg.not_found', ['module' => 'user']), 0);
        }

        $row->isActive = !$row->isActive;
        $status = '';
        if ($row->save()) {
            $status = $row->isActive ? 'active' : 'inactive';

            return $this->toJson([], trans('messages.msg.status.success', ['module' => 'user', 'type' => $status]), 1);
        }
        return $this->toJson([], trans('messages.msg.status.error', ['module' => 'user', 'type' => $status]), 0);
    }

    /**
     * Add business members
     *
     * @param AddMember $request
     *
     * @return
     */
    public function addMember(AddMember $request)
    {

        $user = User::getParentUser();

        $employeeCount = User::where('parentId', $user->id)->count();

        $accessDetail = CommonHelper::getUserAccessDetails();

        if ($accessDetail['employeeStrength'] == $employeeCount) {
            return redirect()->back()->with('error', trans('messages.member.limit'));
        }


        $loggedInUserId = $user->id;
        if ($request->username) {
            $request->merge(['userName' => $request->username]);
        }

        if ($request->firstName || $request->lastName) {
            $request->merge(['firstName' => $request->firstName ?? null, 'lastName' => $request->lastName ?? null]);
        }

        $request->merge(['parentId' => $loggedInUserId, 'role' => 'user', 'planId' => $user->planId, 'themeColor' => $user->themeColor, 'fontColor' => $user->fontColor, 'isMember' => 1, 'isActive' => 2]);
        $createOrUpdate = User::updateOrCreate(['id' => $request->id, 'parentId' => $loggedInUserId], $request->all());

        if ($createOrUpdate) {

            HsmCloudHelper::createUser($createOrUpdate->id);

            $cmd = 'cd ' . base_path() . ' && php artisan mail:senduserregistrationmail ' . $createOrUpdate->id . '';
            exec($cmd . ' > /dev/null &');

            return redirect(route('memberPage'))->with('success', trans('messages.member.invitation_sent'));
        }
        return redirect()->back()->with('error', trans('messages.member.error'));
    }

    /**
     * This function use for get the members detail
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        $user = User::getParentUser();

        $userDetails = User::selectRaw('users.id as userId, users.isActive as userStatus, users.*,  DATE_FORMAT(users.createdAt, "' . config('constant.commonDateYearWithHISAFormat') . '") as userCreatedAtFormat, hsms_tools.name as hsmsName,hsms_tools.*,hsms_tools.id as hsmId')
            ->leftJoin('hsms_tools', 'hsms_tools.allocatedUserId', 'users.id')
            ->where(['users.id' => $id, 'users.parentId' => $user->id])
            ->first();

        $lastUpdatedTime = AuditLog::selectRaw('*, DATE_FORMAT(createdAt, "' . config('constant.hourMinutesFormat') . '") as createdAtFormat')
            ->where('userId', $userDetails->userId)->orderBy('createdAt', 'desc')
            ->first();

        $lastLoginTime = AuditLog::selectRaw('*, DATE_FORMAT(createdAt, "' . config('constant.commonDateYearWithHISAFormat') . '") as createdAtFormat')
            ->where(['userId' => $userDetails->userId, 'action' => 'Login'])
            ->orderBy('createdAt', 'desc')
            ->first();

        $usersIds = User::getUserOrParentUserId();

        $hsmDetail = HsmsTools::selectRaw('hsms_tools.*')
            ->whereIn('allocatedUserId', $usersIds)
            ->first();

        $userHsm = UserHsm::selectRaw('user_hsm.*, hsms_tools.name as hsmName, hsms_tools.location as hsmLocation')->where('organizerId', $id)->leftJoin('hsms_tools', 'hsms_tools.id', 'user_hsm.hsmId')->get();

        $doughnutChartOccupidedSpace = ($hsmDetail && $hsmDetail->storage > 0) ? CommonHelper::removeLastStringAfterSpace($hsmDetail->storage) : 0;
        $doughnutChartOccupidedSpaceRs = ($hsmDetail && $hsmDetail->storage > 0) ? CommonHelper::removeFirstStringBeforeSpace($hsmDetail->storage) : "";
        $doughnutChartUploadedKeys  = ($user->allocatedStorage > 0) ? CommonHelper::removeLastStringAfterSpace(CommonHelper::convertToReadableSize($user->allocatedStorage)) : 0;
        $doughnutChartUploadedKeysRs = ($user->allocatedStorage > 0) ? CommonHelper::removeFirstStringBeforeSpace(CommonHelper::convertToReadableSize($user->allocatedStorage)) : "";

        $customRoles = OrganizationCustomRoles::where('organizerId', $user->id)->get();

        $userDesignation = UserRole::where('userId', $id)->with('getUserRole')->first();

        $passStorageInfo = CommonHelper::passwordStorageInfo($user, null, 1);

        return view('user.members.member-detail', compact('userDetails', 'customRoles', 'lastUpdatedTime', 'lastLoginTime', 'hsmDetail', 'doughnutChartOccupidedSpace', 'doughnutChartUploadedKeys', 'doughnutChartOccupidedSpaceRs', 'doughnutChartUploadedKeysRs', 'userDesignation', 'passStorageInfo', 'userHsm'));
    }

    /**
     * This function use for delete the member
     *
     * @param  mixed $request
     * @return void
     */
    public function deleteUser(Request $request)
    {
        $user = User::getParentUser();
        $delete =   user::where(['parentId' => $user->id, 'id' => $request->id])->first();
        if ($delete) {
            $delete->delete();

            UserRole::where('userId', $request->id)->delete();

            return redirect()->back()->with('success', trans('messages.msg.deleted.success', ['module' => 'user']));
        }
        return redirect()->back()->with('error', trans('messages.msg.deleted.error', ['module' => 'user']));
    }



    /**
     * edit user role
     *
     * @param $id
     * @return array
     */
    public function edit($id)
    {
        if ($id) {
            $editMember = User::where('id', $id)->first();
            $result = ['editMember' => $editMember, 'userId' => $id];
            return $this->toJson($result, trans(), 1);
        }
        return redirect()->back()->with('error', trans('messages.msg.not_found', ['module' => 'user']));
    }


    /**
     * update Member
     *
     * @param Request $request
     * @return
     */
    public function updateMember(Request $request)
    {
        if ($request) {
            User::where('id', $request->id)->update(['userName' => $request->userName, 'email' => $request->email, 'firstName' => $request->firstName, 'lastName' => $request->lastName, 'mobileNumber' => $request->mobileNumber, 'isActive' => $request->isActive]);
            return redirect()->back()->with('success', trans('messages.member.success', ['module' => 'updated']));
        }

        return redirect()->back()->with('error', trans('messages.member.error', ['module' => 'role']));
    }


    /**
     * Search Activity Log.
     *
     * @param Request $request
     *
     * @return json
     */
    public function searchActivityLog(Request $request)
    {
        if ($request->ajax()) {

            $currentPage = ($request->start == 0) ? 1 : (($request->start / $request->length) + 1);

            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });

            $startNo = ($request->start == 0) ? 1 : (($request->length) * ($currentPage - 1)) + 1;

            $query = AuditLog::selectRaw('audit_logs.*, hsms_tools.name, DATE_FORMAT(audit_logs.createdAt,"%b %d, %Y | %h:%i:%s %p") as createdAtFormat, users.email as userEmail, users.userName, CONCAT(users.firstName," ",users.lastName) as fullName')
                ->join('users', 'users.id', 'audit_logs.userId')
                ->leftJoin('hsms_tools', 'hsms_tools.id', 'audit_logs.hsmId')
                ->where('audit_logs.userId', $request->userId);


            $orderDir   = $request->order[0]['dir'];

            $orderColumnId = $request->order[0]['column'];

            $orderColumn  = str_replace('"', '', $request->columns[$orderColumnId]['name']);

            $query->where(function ($query) use ($request) {

                if ($request->search['value'] != null) {

                    $query->orWhere('audit_logs.ipAddress', 'like', '%' . $request->search['value'] . '%')
                        ->orWhere('hsms_tools.name', 'like', '%' . $request->search['value'] . '%')
                        ->orWhere('audit_logs.strength', 'like', '%' . $request->search['value'] . '%')
                        ->orWhere('audit_logs.url', 'like', '%' . $request->search['value'] . '%')
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

                $rows['data'][$key]['createdAtFormat'] = $row['createdAtFormat'];
            }

            return response()->json($rows);
        }
    }

}
