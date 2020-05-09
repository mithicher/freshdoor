<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('products')->delete();

        $json = File::get("database/products.json");
        $products = json_decode($json);

        // $products = [ 
        //     "Lemonade - Kiwi, 591 Ml",
        //     "Wine - Segura Viudas Aria Brut",
        //     "Quail Eggs - Canned",
        //     "Veal - Heart",
        //     "Cheese - Boursin, Garlic / Herbs",
        //     "Halibut - Steaks",
        //     "Chef Hat 25cm",
        //     "Nectarines",
        //     "Langers - Ruby Red Grapfruit",
        //     "Onions - Vidalia",
        //     "Beer - Steamwhistle",
        //     "Arizona - Green Tea",
        //     "Danishes - Mini Raspberry",
        //     "Container - Hngd Cll Blk 7x7x3",
        //     "Roe - Flying Fish",
        //     "Ecolab - Hobart Washarm End Cap",
        //     "Dooleys Toffee",
        //     "Onions - Spanish",
        //     "Rice Paper",
        //     "Limes",
        //     "Yeast Dry - Fleischman",
        //     "Beef - Bones, Cut - Up",
        //     "Bread Ww Cluster",
        //     "Roe - Lump Fish, Red",
        //     "Tea - Darjeeling, Azzura",
        //     "Veal - Sweetbread",
        //     "Paper Cocktail Umberlla 80 - 180",
        //     "Tart Shells - Savory, 4",
        //     "Pepper - White, Whole",
        //     "Tandoori Curry Paste",
        //     "Beef - Ground Medium",
        //     "Carbonated Water - Raspberry",
        //     "Bacardi Mojito",
        //     "Sage - Ground",
        //     "Peas - Frozen",
        //     "Appetizer - Crab And Brie",
        //     "Cranberries - Frozen",
        //     "Kolrabi",
        //     "Wine - Beaujolais Villages",
        //     "Lid Tray - 12in Dome",
        //     "Table Cloth 53x53 White",
        //     "Pepper - Black, Crushed",
        //     "Lentils - Green, Dry",
        //     "Clam Nectar",
        //     "Flour - Bread",
        //     "Kolrabi",
        //     "Wiberg Super Cure",
        //     "Grenadine",
        //     "Soup - Base Broth Beef",
        //     "Soup - Campbells - Chicken Noodle",
        //     "Chips Potato Salt Vinegar 43g",
        //     "Pumpkin - Seed",
        //     "Filter - Coffee",
        //     "Pastry - Plain Baked Croissant",
        //     "Pork - Shoulder",
        //     "Tumeric",
        //     "Beef - Top Butt",
        //     "Apple - Fuji",
        //     "Buffalo - Tenderloin",
        //     "Wine - Red, Colio Cabernet",
        //     "Miso - Soy Bean Paste",
        //     "Peas Snow",
        //     "Seedlings - Clamshell",
        //     "Pork - Ham, Virginia",
        //     "Beef - Tongue, Fresh",
        //     "The Pop Shoppe - Black Cherry",
        //     "Lemonade - Natural, 591 Ml",
        //     "Beans - French",
        //     "Aspic - Light",
        //     "Skirt - 24 Foot",
        //     "Jello - Assorted",
        //     "Nescafe - Frothy French Vanilla",
        //     "Eggplant - Asian",
        //     "Beer - Moosehead",
        //     "Cumin - Ground",
        //     "Cup - 4oz Translucent",
        //     "Tahini Paste",
        //     "Chicken - White Meat With Tender",
        //     "Split Peas - Yellow, Dry",
        //     "Shrimp - Baby, Cold Water",
        //     "Emulsifier",
        //     "Compound - Strawberry",
        //     "Crackers - Soda / Saltins",
        //     "Cup - Paper 10oz 92959",
        //     "Creamers - 10%",
        //     "Beer - Sleeman Fine Porter",
        //     "Soupfoamcont12oz 112con",
        //     "Wine - Beaujolais Villages",
        //     "Coconut Milk - Unsweetened",
        //     "Snapple Lemon Tea",
        //     "Scampi Tail",
        //     "Squash - Pattypan, Yellow",
        //     "Soup Knorr Chili With Beans",
        //     "Wine - Magnotta, White",
        //     "French Pastries",
        //     "Bread Base - Goodhearth",
        //     "Sole - Fillet",
        //     "Sea Bass - Whole",
        //     "Bread - Sour Sticks With Onion",
        // ];

        foreach ($products as $product) {
            // $actualPrice = $faker->numberBetween(400, 600);
            // $discountFactor = (10 / 100) * $actualPrice; // 10% of actual price
            // $discountPrice  = $actualPrice - $discountFactor;

            DB::table('products')->insert([
                'uuid' => $faker->uuid,
                'image' => $product->image,
                'name' => $product->name,
                'slug' => Str::slug($product->name),
                'description' => $faker->text,
                'category_id' => $product->category_id,
                'shop_id' => $faker->randomElement([1, 2, 3, 4, 5, 6]),
                'price' => $product->price,
                'discount' => $product->discount,
                'available' => 1
            ]);
        }
    }
}
