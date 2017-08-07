<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => Hash::make('12345678'),
                'v_token' => $i . $faker->sha256(),
                'created_at' => $faker->dateTimeBetween('-2 years', '-1 years'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now')
            ]);
        }
    }
}
