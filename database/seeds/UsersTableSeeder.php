<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::all()->count() == 0) {
            User::create([
                'name' => 'System Administrator',
                'email' => env("ADMIN_EMAIL"),
                'password' => bcrypt('password1'),
            ]);
        }
    }
}
