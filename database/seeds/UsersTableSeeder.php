<?php

use App\Models\UserProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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

            $faker = Faker::create();

            $user = User::create([
                'name' => 'System Administrator',
                'email' => env("ADMIN_EMAIL"),
                'password' => bcrypt('password1'),
            ]);


            $profile = ['birthdate' => $faker->date(),
                'phone_number' => $faker->phoneNumber,];


            $userProfile = UserProfile::where('user_id', $user->id)->get()->first();
            $userProfile->update($profile);


            $address = [
                'street' => '11107 Sunset Hills Road',
                'city' => 'Reston',
                'state' => "VA",
                'zip' => '20190'
            ];

            $userProfile->address()->update($address);
        }
    }
}
