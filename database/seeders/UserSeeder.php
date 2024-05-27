<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.  
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
        ]);

        User::create([
            'name' => 'peternak',
            'role' => 'peternak',
            'email' => 'peternak@gmail.com',
            'password' => bcrypt(12345678),
        ]);
    }
}
