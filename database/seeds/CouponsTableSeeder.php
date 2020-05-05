<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('coupons')->insert([
            [
                'uuid' => $faker->uuid,
                'name' => 'HELLO123',
                'price' => 100,
                'start' => '2020-05-01',
                'end' => '2020-05-05',
                'active' => 1   
            ],
            [
                'uuid' => $faker->uuid,
                'name' => 'TEST123',
                'price' => 150,
                'start' => '2020-05-01',
                'end' => '2020-05-04',
                'active' => 0   
            ]
        ]);
    }
}
