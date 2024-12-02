<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat beberapa role
        // Membuat default user untuk Super Admin

        $ownerRole = Role::create([
            'name' => 'owner',
        ]);
        $studentRole = Role::create([
            'name' => 'student',
        ]);
        $teacherRole = Role::create([
            'name' => 'teacher',
        ]);

        // Akun Super Admin untuk mengelola data awal
        // Data kategori, kelas, dan sebagainya.
        $userOwner = User::create([
            'name' => 'Adit',
            'occupation' => 'Student',
            'avatar' => 'images/default-avatar.png',
            'email' => 'Adit@gmail.com',
            'password' => bcrypt('123123123')
        ]);

        $userOwner->assignRole($ownerRole);
    }
}
