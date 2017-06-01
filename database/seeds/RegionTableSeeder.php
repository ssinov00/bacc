<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([
            'id'   => '1',
            'name' => 'Zup1'
        ]);
        Region::create([
            'id'   => '2',
            'name' => 'Zup2'
        ]);
        Region::create([
            'id'   => '3',
            'name' => 'Zup3'
        ]);
        Region::create([
            'id'   => '4',
            'name' => 'Zup4'
        ]);
    }
}
