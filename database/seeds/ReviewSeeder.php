<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class ReviewSeeder extends Seeder
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
            DB::table('reviews')->insert([
                'user_id' => $faker->unique()->numberBetween(1, 10),
                'candidate_id' => $faker->numberBetween(1, 50),
                'review' => $faker->numberBetween(1, 5),
                'created_at' => $faker->dateTimeBetween('-2 years', '-1 years'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now')
            ]);
        }
    }
}
