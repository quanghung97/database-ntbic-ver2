<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        		'username' => 'admin',
        		'email' => 'abc@abc.com',
        		'password' => bcrypt('123456'),
        		'author' => 'admin',
        	]);
    }
}
