<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'Renal Eki Riyanto',
            'username' => 'renaleki',
            'email' => 'renaleki@test.com',
            'phone' => '082390460261',
            'password' => Hash::make('renaleki123')
        ]);
        User::create([
            'name' => 'Abdul Aziz Kamil',
            'username' => 'kamil',
            'email' => 'kamil@test.com',
            'phone' => '092843761234',
            'password' => Hash::make('kamil123')
        ]);
        User::create([
            'name' => 'Herfio Lesananda',
            'username' => 'herfio',
            'email' => 'herfio@test.com',
            'phone' => '123456789012',
            'password' => Hash::make('herfio123')
        ]);
    }
}
