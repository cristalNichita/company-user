<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function toJson(array $result = [], string $message = null, int $status = 1): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'result' => !empty($result) ? $result : new \stdClass(),
            'message' => $message,
        ], 200, [], JSON_PRESERVE_ZERO_FRACTION);
    }


    /**
     * Show the check unique value.
     *
     * @return \Illuminate\Http\Response
     **/
    public function checkUnique(Request $request, $table, $columnName)
    {
        if ($request->ajax()) {

            if (!empty($table)) {
                if ($table == 'users') {
                    if (!empty($request->value)) {
                        $where = [
                            [$columnName, '=', $request->value],
                        ];

                        if (!empty($request->id)) {
                            $where[] = ['id', '!=', $request->id];
                        }

                        $where[] = ['deletedAt', '=', null];

                        $count = DB::table($table)
                            ->where($where)
                            ->count();

                        return $count > 0 ?  'false' : 'true';
                    }
                }
            }
            if (!empty($request->value)) {
                $where = [
                    [$columnName, '=', $request->value],
                ];

                if (!empty($request->id)) {
                    $where[] = ['id', '!=', $request->id];
                }

                $count = DB::table($table)
                    ->where($where)
                    ->count();

                return $count > 0 ?  'false' : 'true';
            }
        }
    }



    /**
     * Show the check unique account user id value.
     *
     * @return \Illuminate\Http\Response
     **/
    public function checkUniqueAccountUserId(Request $request, $table, $columnName)
    {
        if ($request->ajax()) {

            if (!empty($table)) {
                if ($table == 'platform_accounts') {
                    if (!empty($request->value)) {
                        $where = [
                            [$columnName, '=', $request->value],
                            ['platform', '=', $request->id]
                        ];

                        $count = DB::table($table)
                            ->where($where)
                            ->count();

                        return $count > 0 ?  'false' : 'true';
                    }
                }
            }
        }
    }


    /**
     * Show the check unique employee id as per parent user.
     *
     * @return \Illuminate\Http\Response
     **/
    public function checkUniqueEmployeeId(Request $request, $table, $columnName)
    {
        if ($request->ajax()) {

            $parentUser = User::getParentUser();
            $isUnique = User::where(function ($query) use ($request, $parentUser) {
                return $query->where('parentId', $parentUser->id)
                    ->where('employeeId', $request->employeeId);
            })
                ->whereNull('deletedAt')
                ->count();

            return $isUnique > 0 ?  'false' : 'true';
        }
    }

    /**
     * Show the check unique employee id as per parent user.
     *
     * @return \Illuminate\Http\Response
     **/
    public function checkUniqueAdminEmployeeId(Request $request, $table, $columnName)
    {
        if ($request->ajax()) {

            $parentUser = User::getAdminParentUser();
            $isUnique = User::where(function ($query) use ($request, $parentUser) {
                return $query->where('parentId', $parentUser->id)
                    ->where('employeeId', $request->employeeId);
            })
                ->whereNull('deletedAt')
                ->count();

            return $isUnique > 0 ?  'false' : 'true';
        }
    }

    /**
     * Show the check own employee id value.
     *
     * @return \Illuminate\Http\Response
     **/
    public function checkOwnEmployeeId(Request $request, $table, $columnName)
    {
        if ($request->ajax()) {

            if (!empty($table)) {
                if ($table == 'users') {
                    if (!empty($request->value)) {
                        $where = [
                            [$columnName, '=', $request->value],
                        ];

                        if (!empty($request->id)) {

                            $parentUserId = User::where('id', $request->id)->pluck('parentId')->first();
                            if ($parentUserId) {
                                $parentUser = User::where('id', $parentUserId)->first();
                                if ($parentUser->role == 'business') {
                                    $where[] = ['parentId', '=', $parentUser->id];
                                }
                            }

                            $where[] = ['id', '=', $request->id];
                        }

                        $where[] = ['deletedAt', '=', null];

                        $count = DB::table($table)
                            ->where($where)
                            ->count();

                        return $count > 0 ?  'true' : 'false';
                    }
                }
            }
        }
    }
}
