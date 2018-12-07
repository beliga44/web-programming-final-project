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
                'name' => 'Hardware'
            ],
            [
                'name' => 'Software'
            ],
            [
                'name' => 'Business'
            ],
            [
                'name' => 'Politic'
            ],
            [
                'name' => 'Book'
            ],
            [
                'name' => 'Cooking'
            ]
        ];

        DB::table('categories')->insert($data);
    }
}
