<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;
use Faker\Factory as Faker;
class ProfilesTableSeeder extends Seeder
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
        Profile::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $users = User::all()->count();
        for ($i=1; $i <=$users; $i++) { 
            Profile::create([
                'user_id' =>  User::find($i)->id,
                'email' => User::find($i)->email,
                'address' => $faker->streetAddress,
                'phone' => $faker->phoneNumber,
                'active' => 0,
            ]);
        }
        Profile::find(1)->update([
            'active' => 1,
        ]);
        
    }
}
