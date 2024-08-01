<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class PermissionModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Role Management',
                'slug' => 'custom-roles',
                'title' => 'Role Management',
                'isActive' => 1,
                'methods' => json_encode(['index' => 'Get List OF Roles', 'create' => 'Create Roles', 'edit' => 'Update Roles','show' => 'Show Roles Details', 'roleDelete' => 'Delete Roles']),
                'orderBy' => 1
            ],
            [
                'name' => 'User Management',
                'slug' => 'members',
                'title' => 'User Management',
                'isActive' => 1,
                'methods' => json_encode(['index' => 'Get List OF Users', 'addMember' => 'Invite Users To Account', 'edit' => 'Update Users Account Role', 'show' => 'Show User Details', 'deleteUser' => 'Delete Users From Account', 'changeMemberStatus' => 'Users Enable/Disable']),
                // 'methods' => json_encode(['index' => 'Get List OF Users', 'addMember' => 'Invite Users To Account', 'edit' => 'Update Users Account Role', 'memberViewDetailPage' => 'Show User Details', 'deleteUser' => 'Delete Users From Account', 'changeMemberStatus' => 'Users Enable/Disable']),
                'orderBy' => 2
            ],
            [
                'name' => 'Access Key Management',
                'slug' => 'cloud',
                'title' => 'Access Key Management',
                'isActive' => 1,
                'methods' => json_encode(['index' => 'Get List OF Digital Key', 'uploadCloudFile' => 'Upload Digital Key', 'fileDetails' => 'Show Digital Key Details', 'deleteCloudFile' => 'Delete Digital Key']),
                'orderBy' => 3
            ],
            [
                'name' => 'Setting',
                'slug' => 'setting',
                'title' => 'Setting',
                'isActive' => 1,
                'methods' => json_encode(['changePassword' => 'Authentication', 'updateProfile' => 'Edit Profile']),
                'orderBy' => 4
            ],
            [
                'name' => 'HSM Details',
                'slug' => 'hsm-device',
                'title' => 'HSM Details',
                'isActive' => 1,
                'methods' => json_encode(['index' => 'Get List OF HSM', 'hsmsToolDetails' => 'HSM Details']),
                'orderBy' => 5
            ],
        ];

        foreach ($data as $key => $d) {

            $dataInfo = Module::where('slug', $d['slug'])->first();
            if (empty($dataInfo)) {
                $dataInfo = new Module;
            }
            $dataInfo->name = $d['name'];
            $dataInfo->slug = $d['slug'];
            $dataInfo->title = $d['title'];
            $dataInfo->isActive = $d['isActive'];
            $dataInfo->methods = $d['methods'];
            $dataInfo->orderBy = $d['orderBy'];
            $dataInfo->save();
        }
    }
}
