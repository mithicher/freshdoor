<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 
            'Branded Foods', 
            'Households', 
            'Veggies & Fruits', 
            'Kitchen', 
            'Bread & Bakery',
            'Dairy & Eggs',
            'Drinks & Juice'
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => trim($category),
                'slug' => Str::slug($category)
            ]);
        }
    }
}
