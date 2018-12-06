<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];

        for ($i = 0; $i < 25; $i++) {
            $data[$i] = [
                'content' => $faker->sentence,
                'receiver_id' => $i % 2 == 0 ? 1 : 2,
                'sender_id' => $i % 2 == 0 ? 2 : 1,
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ];
        }

        DB::table('messages')->insert($data);
    }
}
