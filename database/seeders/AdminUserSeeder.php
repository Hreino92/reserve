<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',  // Cambia esto por el correo que desees
            'password' => Hash::make('00000000'),  // Cambia la contraseña
            'is_admin' => true,  // Establecer el campo 'is_admin' como true
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
