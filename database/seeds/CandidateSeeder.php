<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 50; $i++) {
            DB::table('candidates')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'url' => $faker->url,
                'cover_letter' => $faker->realText(1000),
                'attachment' => $i . '.pdf',
                'like_working' => $faker->boolean(),
                'ip_address' => $faker->ipv4(),
                'created_at' => $faker->dateTimeBetween('-2 years', '-1 years'),
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now')
            ]);
        }
    }
}
