<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  User::create([
            'first_name' => 'Admin',
            'last_name' => 'Test',
            'business_name' => 'Test Business',
            'country' => 'GH',
            'phone' => '01521458894',
            'registered_business' => 'Yes',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678)
       ]);
       $user->assignRole(ADMIN);
    }
}
