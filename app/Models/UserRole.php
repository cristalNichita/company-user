<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserRole extends CustomModel
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['userId', 'roleId'];



    /**
     * Get User Role
     */
    public function getUserRole()
    {
        return $this->hasOne('App\Models\OrganizationCustomRoles', 'id', 'roleId')
            ->selectRaw('organization_custom_roles.roleName, organization_custom_roles.id, organization_custom_roles.*')
            ->orderBy('createdAt', 'desc');
    }

    /**
     * Add And Update Employee Role
     *
     * @param $userRole, $userId)
     * @return
     */
    public static function createAdminEmployeeRole($userRole, $userId)
    {
        self::where('userId', $userId)->delete();
        self::insert([
            'id' => Str::uuid(),
            "userId" => $userId,
            "roleId" => $userRole
        ]);


        //---------------
        $assignHsm = OrganizationCustomRoles::where('id', $userRole)->first();

        if ($assignHsm) {
            UserHsm::where('organizerId', $userId)->delete();

            foreach ($assignHsm->hsmStorage as $key => $value) {
                User::Where('id', $userId)->update(['primaryHsmId' => $value['id']]);

                $userRoleData[] = [
                    'id' => Str::uuid(),
                    "organizerId" => $userId,
                    "hsmId" => $value['id'],
                    "allocatedStorage" => $value['storage'],
                    "availableSpace" => $value['storage'],
                ];
                $organizerSize = UserHsm::where(['organizerId' => Auth::user()->id, 'hsmId' => $value['id']])->first();
                $organizerSize->update([
                    'usedSpace' => ($organizerSize->usedSpace + $value['storage']),
                    'availableSpace' => ($organizerSize->availableSpace - $value['storage'])
                ]);
            }
            UserHsm::insert($userRoleData);
        }
    }


    /**
     * Update Employee Role for Custom Role Module
     *
     * @param $userRole, $userId)
     * @return
     */
    public static function updateEmployeeRole($userRole, $userId)
    {
        $assignHsm = OrganizationCustomRoles::where('id', $userRole)->first();

        if ($assignHsm) {

            foreach ($assignHsm->hsmStorage as $key => $value) {
                $userHsm = UserHsm::where(['organizerId' => $userId, 'hsmId' => $value['id']])->first();
                User::Where('id', $userId)->update(['primaryHsmId' => $value['id']]);

                $userRoleData = [
                    "organizerId" => $userId,
                    "hsmId" => $value['id'],
                ];

                $userHsm->update($userRoleData);
            }
        }
    }
}
