<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create users
        $users = [];
        for ($i = 0; $i < 5; $i++) {
            $users[] = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('123456789'), // Set default password
            ]);
        }

        // Create tags
        for ($i = 0; $i < 10; $i++) {
            Tag::create([
                'name' => $faker->word,
                'color' => $faker->hexColor,
                'user_id' => $users[array_rand($users)]->id, // Associate with a random user
            ]);
        }
    }
}
