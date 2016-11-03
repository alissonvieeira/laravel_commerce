<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        //Comentando porque no POSTGRESQL tem que ser delete e não truncate
        //DB::table('users')->truncate();
        DB::table('users')->delete();

        factory(CodeCommerce\User::class)->create(
            [
                'name' => 'Alisson',
                'email' => 'alisson.echo@gmail.com',
                'password' => Hash::make(123456)
            ]
        );
        factory(CodeCommerce\User::class, 10)->create();


    }

}