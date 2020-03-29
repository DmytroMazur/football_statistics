<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Dima Mazur',
            'email'    => 'dimamazur9@gmail.com',
            'password' => Hash::make('D3v3l0pm3nt'),
            'user_type'    => 'admin',
        ));
    }

}

