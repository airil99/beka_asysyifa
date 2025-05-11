<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Ensure the User model is imported
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating a manager
        User::create([
            'name' => 'Syafiq Jamal', // Replace with the actual manager's name
            'email' => 'manager@gmail.com', // Replace with the actual manager's email
            'phone' => '0123456789', // Replace with the actual manager's phone
            'password' => Hash::make('manager'), // Replace with a secure password
            'role' => 'manager', // Assign role as manager
        ]);

        // Creating a staff member
        User::create([
            'name' => 'Waheeda', // Replace with the actual staff's name
            'email' => 'staff1@gmial.com', // Replace with the actual staff's email
            'phone' => '0987654321', // Replace with the actual staff's phone
            'password' => Hash::make('waheeda'), // Replace with a secure password
            'role' => 'staff', // Assign role as staff
        ]);
    }
}
