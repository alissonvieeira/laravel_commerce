<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->delete();

        factory(CodeCommerce\Product::class, 40)->create();
    }
}