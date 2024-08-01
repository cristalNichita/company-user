<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HsmsTools;
use Illuminate\Support\Str;

class HsmToolSeeder extends Seeder
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
                'id'       => Str::uuid(),
                'name'     => 'Monstor disk 1',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],
            [
                'id'       => Str::uuid(),
                'name'     => 'Monstor disk 2',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'San disk 1',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'San disk 2',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'Glinston disk 1',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'Glinston disk 2',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'Test disk 1',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'Test disk 2',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'Sample disk 1',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'Sample disk 2',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'Cretive disk 1',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],[
                'id'       => Str::uuid(),
                'name'     => 'Cretive disk 2',
                'macId' =>  Str::random(15),
                'licenceNumber' => Str::random(50),
                'ipAddress' => '192.168.2.83',
                'storage' => '10 GB',
                'availableStorage' => '9 GB',
                'temperature' => '25',
                'lastUseDateTime' => '2023-02-28 09:00:00',
                'isActive' => 1,
                'status' => 'Created',
            ],
        ];
        HsmsTools::insert($data);
    }
}
