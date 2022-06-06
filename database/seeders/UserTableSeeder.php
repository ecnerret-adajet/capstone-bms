<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Users
         *
         */
        if (User::where('email', '=', 'admin@gmail.com')->first() === null) {
            $newUser = User::create([
                'name'     => 'Admin',
                'email'    => 'admin@gmail.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
