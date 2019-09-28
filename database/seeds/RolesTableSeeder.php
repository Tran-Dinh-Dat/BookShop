<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $roles = [
            [
                'admin',
                'Có thể quản lý tất cả dữ liệu'
            ],
            [
                'user',
                'Có thể mua hàng, contact'
            ],
            
            
        ];
        
            foreach ($roles as  $role) {
                Role::create([
                    'role_name' => $role[0],
                    'description' => $role[1],
                ]);
            }
        
       
        
        
    }
}
