<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'id'   => '1',
            'name' => 'Pas'
        ]);
        Type::create([
            'id'   => '2',
            'name' => 'Mačka'
        ]);
        Type::create([
            'id'   => '3',
            'name' => 'Glodavac'
        ]);
        Type::create([
            'id'   => '4',
            'name' => 'Gmaz'
        ]);
    }
}
