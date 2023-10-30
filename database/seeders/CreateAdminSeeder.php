<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@radevs.loc',
            'password' => Hash::make(12345678),
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);

        $admin->assignRole('admin');
    }
}
