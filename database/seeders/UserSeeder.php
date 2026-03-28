<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'username' => 'usuario1',
                'name' => 'Carlos Méndez',
                'email' => 'compras@halcon.com',
                'role' => 'PURCHASING',
            ],
            [
                'username' => 'ventas1',
                'name' => 'Laura Sánchez',
                'email' => 'ventas@halcon.com',
                'role' => 'SALES',
            ],
            [
                'username' => 'almacen1',
                'name' => 'Roberto Flores',
                'email' => 'almacen@halcon.com',
                'role' => 'WAREHOUSE',
            ],
            [
                'username' => 'ruta1',
                'name' => 'Miguel Torres',
                'email' => 'ruta@halcon.com',
                'role' => 'ROUTE',
            ],
        ];

        foreach ($users as $u) {
            $role = Role::where('name', $u['role'])->first();

            if (!$role) {
                continue;
            }

            User::firstOrCreate(
                ['username' => $u['username']],
                [
                    'password_hash' => Hash::make('User12345'),
                    'full_name' => $u['name'],
                    'email' => $u['email'],
                    'is_active' => true,
                    'created_at' => now(),
                    'role_id' => $role->role_id,
                ]
            );
        }
    }
}