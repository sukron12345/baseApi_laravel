<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        $users = User::limit(10)->get();
        $faker = Faker::create('id_ID');

        foreach ($users as $key => $user) {
            UserProfile::create([
                'user_id' => $user->id,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'address' => $faker->address,
            ]);
        }
    }
}
