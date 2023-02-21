<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         \DB::table('users')->insert([
                [
                    'name' => 'Admin', 'email' => 'admin@example.com', 'password' => Hash::make('12345678'), 'role' => 'admin'
                ],
                [
                    'name' => 'Patient', 'email' => 'patient@example.com', 'password' => Hash::make('12345678'), 'role' => 'patient'
                ],
                [
                    'name' => 'Doctor', 'email' => 'doctor@example.com', 'password' => Hash::make('12345678'), 'role' => 'doctor'
                ],
                [
                    'name' => 'Hospital', 'email' => 'hospital@example.com', 'password' => Hash::make('12345678'), 'role' => 'hospital'
                ]
            ]);
    }
}
