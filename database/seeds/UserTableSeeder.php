<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();

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