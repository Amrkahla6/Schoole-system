<?php

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
        DB::table('users')->insert([
            'name'     => 'Amr Kahla',
            'email'    => 'amrkahla6@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
