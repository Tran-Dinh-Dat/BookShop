<?php

use Illuminate\Database\Seeder;
use App\Models\ProductType;
use App\Models\Category;
class Product_typeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_types = [
            [
                'Iphone',
                'Samsung',
                'Sony',
                'Lg',
            ],
            [
                'Dell',
                'HP',
                'Asus',
                'Msi',
            ],
            [
                'Tai nghe',
                'Máy nghe nhạc',
                'Sạc dự phòng',
                'Ốp lưng',
            ],
            [
                'Dụng cụ vệ sinh bàn phím',
            ],

        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ProductType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        for ($i=0; $i < 4; $i++) { 
            foreach ($product_types[$i] as  $product_type) { 
                ProductType::create([
                    'category_id' => Category::find($i+1)->id,
                    'name' => $product_type,
                    'slug' => str_slug($product_type),
                    'status' => 1,
                ]);
            }
        }
        
    }
}
