<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
       User::updateOrCreate(
    ['email' => 'admin@admin.com'],
    [
        'name'       => 'Admin Principal',
        'first_name' => 'Admin',
        'last_name'  => 'Principal',
        'username'   => 'admin',
        'phone'      => null,
        'profile'    => 'Administrador',
        'password'   => bcrypt('admin1234'),
    ]
);

    }
}
