<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        for($i = 1; $i <= 10;$i++)
        {
        	DB::table('users')->insert(
	        	[
	        		'username' => 'User_'.$i,
	            	'email' => 'user_'.$i.'@gmail.com',
	            	
	            	'role'=> 0,
	            	'password' => bcrypt('123456'),
	            	'created_at' => new DateTime(),
	            	'update_at'
	        	]
        	);
        }
    
    } 
}
