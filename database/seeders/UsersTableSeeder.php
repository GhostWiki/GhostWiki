<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'remember_token' => '',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'email_confirmed' => 1,
                'image_id' => 0,
                'external_auth_id' => '',
                'system_name' => NULL,
                'slug' => 'admin',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Guest',
                'email' => 'guest@example.com',
                'password' => '',
                'remember_token' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'email_confirmed' => 1,
                'image_id' => 0,
                'external_auth_id' => '',
                'system_name' => 'public',
                'slug' => 'guest',
            ),
        ));
        
        
    }
}