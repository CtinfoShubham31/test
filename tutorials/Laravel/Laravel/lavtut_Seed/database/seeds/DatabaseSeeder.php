<?php

use Illuminate\Database\Seeder;
//use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/*$faker = Faker::create();
        // $this->call(UsersTableSeeder::class);
		foreach(range(1,10) as $index){
			DB::table('users')->insert([
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => bcrypt('secret'),
			]);
		}
		*/
		//factory(App\User::class,50)->create();
		factory(App\Employees::class,20)->create();
    }
}
