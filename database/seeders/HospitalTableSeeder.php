<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class HospitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hospitals')->insert([
            array(
                'hospital_name' => 'Hospital 1',
                'address' => 'Address 1',
                'hospital_id' => 0001,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'hospital_name' => 'Hospital 2',
                'address' => 'Address 2',
                'hospital_id' => 0002,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'hospital_name' => 'Hospital 3',
                'address' => 'Address 3',
                'hospital_id' => 0003,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ]);
    }
}
