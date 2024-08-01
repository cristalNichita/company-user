<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
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
                'id'   => Str::uuid(),
                'paypalId'  => '',
                'planName'   => 'Hardware Renting',
                'price'      => '',
                'type'   => 'Hardware',
                'description' => '<ul><li>Initial hardware setup</li><li>Consulting</li><li>Installation</li><li>Support</li><li>Maintenance</li></ul>',
                'isActive'   => 1
            ],
            [
                'id'   => Str::uuid(),
                'paypalId'  => '',
                'planName'   => 'Hardware Purchase',
                'price'      => '',
                'type'   => 'Hardware',
                'description' => '<ul><li>Initial hardware setup</li><li>Consulting</li><li>Installation</li><li>Support</li><li>Maintenance</li></ul>',
                'isActive'   => 1
            ],
            [
                'id'   => Str::uuid(),
                'paypalId'  => '',
                'planName'   => 'Hardware Financing Option',
                'price'      => '',
                'type'   => 'Hardware',
                'description' => '<ul><li>100 Users maximum capacity per hardware module</li><li>Monthly Payment : $833.33 (for 24 months)</li><li>As above with individual pricing</li></ul>',
                'isActive'   => 1
            ],
        ];
        Plan::insert($data);
    }
}
