<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'setting_key' => 'app-disable-comments',
                'value' => 'false',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'type' => 'string',
            ),
            1 => 
            array (
                'setting_key' => 'app-public',
                'value' => 'true',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'type' => 'string',
            ),
            2 => 
            array (
                'setting_key' => 'app-secure-images',
                'value' => 'false',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'type' => 'string',
            ),
            3 => 
            array (
                'setting_key' => 'user:1:dark-mode-enabled',
                'value' => 'true',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'type' => 'string',
            ),
            4 => 
            array (
                'setting_key' => 'user:1:section_expansion#home-details',
                'value' => 'true',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'type' => 'string',
            ),
        ));
        
        
    }
}