<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@mims.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'title' => 'Mr.',
            'firstname' => 'Admin',
            'lastname' => 'Last',
            'profession' => 'Profession here',
            'organization' => 'Organzation here',
            'country_id' => 1,
            'state_id' => 1,
            'city_id' => 1,
            'zipcode' => '123456',
            'address' => '123 Main St',
            'telephone' => '1234567890',
            'fax' => '1234567890',
            'role_id' => 1,
            'is_active' => 1,
            'is_deleted' => 0,
            'remember_token' => \Str::random(10)
        ]);
    }
}
