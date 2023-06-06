<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
        $user2 = User::create([
            'name' => 'dika',
            'email' => 'dika@gmail.com',
            'password' => bcrypt('dika')
        ]);
        $role = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'mahasiswa']);
        $user->assignRole([$role->id]);
        $user2->assignRole([$role2->id]);
    }
}
