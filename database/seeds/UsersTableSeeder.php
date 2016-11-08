<?php

use App\User;
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
        User::create([
            'name' => 'Administrator',
            'email' => 'lesnikova-design@mail.ru',
            'password' => bcrypt('11111'),
        ]);

        User::create([
            'name' => 'Nikita Kiselev',
            'email' => 'kiselev2008@gmail.com',
            'password' => bcrypt('22061989'),
        ]);
    }
}
