<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
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
            'Điện thoại',
            'Máy tính',
            'Phụ kiện',
            'Sản phẩm khác',
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($categories as  $category) { 
            Category::create([
                'name' => $category,
                'slug' => str_slug($category),
                'status' => 1,
            ]);
        }
    }
}
