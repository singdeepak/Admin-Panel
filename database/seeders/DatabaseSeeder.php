<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'test@gmail.com',
            'contact' => '8677564534',
            'username' => 'user',
            'password' => bcrypt('12345678')
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'contact' => '8976564534',
            'username' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);

        $user->assignRole($user_role);
        $admin->assignRole($admin_role);
    }
}
