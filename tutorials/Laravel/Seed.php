<?php 

Step 1: Make one schema for account details.

=> php artisan make:migration create_accounts_table

So, it will create one schema file in which, we need to define the columns like the following.

C:\xampp\htdocs\lavtut\database\migrations\2019_07_17_144357_create_accounts_table.php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('account_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}

Now, fire the following command in the terminal.

=> php artisan migrate


Step 2: Fill the tables with the values.

php artisan make:seeder AccountsTableSeeder

C:\xampp\htdocs\lavtut\database\seeds\AccountsTableSeeder.php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('accounts')->insert([
            'user_id' => 1,
            'account_number' => rand(100000000,999999999)
        ]);
        DB::table('accounts')->insert([
            'user_id' => 2,
            'account_number' => rand(100000000,999999999)
        ]);
        DB::table('accounts')->insert([
            'user_id' => 3,
            'account_number' => rand(100000000,999999999)
        ]);
        DB::table('accounts')->insert([
            'user_id' => 4,
            'account_number' => rand(100000000,999999999)
        ]);
        DB::table('accounts')->insert([
            'user_id' => 5,
            'account_number' => rand(100000000,999999999)
        ]);
    }
}


Now, add the following code in the DatabaseSeeder.php file.

C:\xampp\htdocs\lavtut\database\seeds\DatabaseSeeder.php

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
        $this->call(AccountsTableSeeder::class);
    }
}

Type the following cmd in your terminal.

=> php artisan db:seed











































