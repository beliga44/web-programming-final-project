<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Bowo',
                'email' => 'a@gmail.com',
                'password' => bcrypt('asdqwe'),
                'phone_number' => '0857525125122',
                'gender' => 0,
                'address' => 'Pakubowono Street 16',
                'profile_picture' => 'bowo.jpg',
                'dob' => '1998-10-09',
                'is_admin' => 1
            ], [
                'name' => 'Bowo',
                'email' => 'b@gmail.com',
                'password' => bcrypt('asdqwe'),
                'phone_number' => '0857525125122',
                'gender' => 0,
                'address' => 'Pakubowono Street 16',
                'profile_picture' => 'bowo.jpg',
                'dob' => '1998-10-09',
                'is_admin' => 0
            ]
        ]);
    }
}
