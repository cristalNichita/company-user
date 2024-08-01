<?php

namespace Database\Seeders;

use App\Models\PlanFeature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlanFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlanFeature::create([
            'id'       => Str::uuid(),
            'planId'  => '',
            'title'   => 'Corporation',
            'features'      => '',
            'value'   => 'Business',
        ]);
    }
}
