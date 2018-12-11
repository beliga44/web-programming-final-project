<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $data = [];

        for ($i = 0; $i < 25; $i++) {
            $data[$i] = [
                'name' => $faker->word,
                'category_id' => $faker->numberBetween($min = 1, $max = 5),
                'poster_id' => $faker->numberBetween($min = 1, $max = 2),
                'is_closed' => false,
                'description' => $faker->sentence,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ];
        }

        DB::table('threads')->insert($data);
    }
}
