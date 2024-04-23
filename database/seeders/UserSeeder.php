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
            'name' => 'superadmin',
            'role' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt(12345678),
        ]);

        User::create([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
        ]);
        User::create([
            'name' => 'mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt(12345678),
        ]);
    }
}
