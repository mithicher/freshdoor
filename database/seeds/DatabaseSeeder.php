<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create();

        $this->call([
            CategoriesTableSeeder::class,
            ShopsTableSeeder::class,
            CouponsTableSeeder::class,
            ProductsTableSeeder::class,
            OffersTableSeeder::class,
        ]);


        // factory(\App\Category::class, 10)->create();
        // factory(\App\Shop::class, 10)->create();
        // factory(\App\Product::class, 100)->create();
    }
}
