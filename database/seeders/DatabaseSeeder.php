<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin = \Spatie\Permission\Models\Role::create(
            [
                "name" => "admin",
            ]
        );

        $doctor = \Spatie\Permission\Models\Role::create(
            [
                "name" => "doctor",
            ]
        );

        $patient = \Spatie\Permission\Models\Role::create(
            [
                "name" => "patient",
            ]
        );

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email' => 'admin@example.com',
            'contact_number' => '09123456789',
            'password' => Hash::make('admin1234'),
        ])->assignRole($admin);

        \App\Models\User::factory()->create([
            'username' => 'doctor',
            'first_name' => 'Joseph',
            'last_name' => 'Dela Cruz',
            'email' => 'doctor@example.com',
            'contact_number' => '09123456789',
            'password' => Hash::make('doctor1234'),
        ])->assignRole($doctor);

        \App\Models\User::factory()->create([
            'username' => 'patient',
            'first_name' => 'Mark',
            'last_name' => 'Dela Cruz',
            'email' => 'patient@example.com',
            'contact_number' => '09123456789',
            'password' => Hash::make('patient1234'),
        ])->assignRole($patient);

        \App\Models\Admin::factory()->create([
            'user_id' => 1,
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email' => 'admin@example.com',
            'birthday' => '2001-11-14',
            'contact_number' => '09123456789',
            'address' => 'Caloocan City',
        ]);

        \App\Models\Doctor::factory()->create([
            'user_id' => 2,
            'first_name' => 'Joseph',
            'last_name' => 'Dela Cruz',
            'email' => 'doctor@example.com',
            'birthday' => '2001-11-14',
            'contact_number' => '09123456789',
            'address' => 'Caloocan City',
        ]);

        \App\Models\Patient::factory()->create([
            'user_id' => 3,
            'first_name' => 'Mark',
            'last_name' => 'Dela Cruz',
            'email' => 'patient@example.com',
            'birthday' => '2001-11-14',
            'contact_number' => '09123456789',
            'address' => 'Caloocan City',
        ]);
    }
}
