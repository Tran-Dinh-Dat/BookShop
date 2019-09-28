<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::table('user_roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123123123),
        ]);
        $admin->roles()->attach(1);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt(123123123),
        ]);
        $user->roles()->attach(2);

        $user2 = User::create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => bcrypt(123123123),
        ]);
        $user2->roles()->attach(2);
    }
}
