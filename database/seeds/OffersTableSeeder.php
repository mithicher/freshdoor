<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $products = DB::table('products')->whereIn('category_id', [1, 2, 3])->limit(5)->get();

        foreach ($products as $product) {
            DB::table('offers')->insert([
                'product_id' => $product->id
            ]);
        }
    }
}
