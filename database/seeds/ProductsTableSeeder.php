<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Category;
use Faker\Factory as Faker;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        for ($i=1; $i < 10; $i++) { 
            Product::create([
                'name' => 'Iphone '.$i,
                'slug' => str_slug('Iphone '.$i),
                'decription' => $faker->text($maxNbChars = 100),
                'sale' => 0.3,
                'price' => rand(10000, 30000),
                'quanlity' => 50,
                'image' => rand(1000,2000).'jpg',
                'status' => 1,
                'category_id' => 1,
                'product_type_id' => 1,
            ]);
        }

    }
}
