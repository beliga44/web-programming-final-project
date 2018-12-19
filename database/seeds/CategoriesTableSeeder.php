<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Hardware',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Software',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'name' => 'Politic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Book',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cooking',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('categories')->insert($data);
    }
}
