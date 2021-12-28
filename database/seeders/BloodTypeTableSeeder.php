<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class BloodTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_types')->insert([
            array(
                'name' => 'A+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),   
            array(
                'name' => 'B+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),   
            array(
                'name' => 'AB+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),   
            array(
                'name' => 'O',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),   
        ]);
    }
}
