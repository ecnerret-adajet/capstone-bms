<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Model::unguard();

        $this->call([
            BloodTypeTableSeeder::class,
            GenderTableSeeder::class,
            HospitalTableSeeder::class,
            PurposeTableSeeder::class,
            RhGroupTableSeeder::class,
            UrgencyTableSeeder::class,
            StatusTableSeeder::class,
            UserTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            ConnectRelationshipsSeeder::class,
        ]);

        Model::reguard();
    }
}
