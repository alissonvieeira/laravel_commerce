<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->delete();

        factory(CodeCommerce\Category::class, 15)->create();

    }

}