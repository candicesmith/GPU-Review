<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            'name' => 'Gigabyte',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'PowerColor',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'ASUS',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'ASRock',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Inno3D',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'PNY',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
