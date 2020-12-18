<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
Use App\Models\Role;
use DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $moderatorRole = Role::where('name','moderator')->first();
        $guestRole = Role::where('name','guest')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        $moderator = User::create([
            'name' => 'Moderator User',
            'email' => 'moderator@moderator.com',
            'password' => Hash::make('password')
        ]);
        $guest = User::create([
            'name' => 'Guest User',
            'email' => 'guest@guest.com',
            'password' => Hash::make('password')
        ]);
        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $moderator->roles()->attach($moderatorRole);
        $guest->roles()->attach($guestRole);
        $user->roles()->attach($userRole);
    }
}
