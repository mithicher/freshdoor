<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $shops = [ 
            'Farmland Partners Inc.', 
            'BioTelemetry, Inc.', 
            'SPAR Group, Inc.', 
            'Fortis Inc.', 
            'Bay Bancorp, Inc.',
            'SGOCO Group, Ltd' 
        ];

        foreach ($shops as $shop) {
            DB::table('shops')->insert([
                'name' => trim($shop),
                'slug' => Str::slug($shop)
            ]);
        }
    }
}
