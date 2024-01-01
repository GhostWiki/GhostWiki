<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'display_name' => 'Admin',
                'description' => 'Administrator of the whole application',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'system_name' => 'admin',
                'external_auth_id' => '',
                'mfa_enforced' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'display_name' => 'Editor',
                'description' => 'User can edit Books, Chapters & Pages',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'system_name' => '',
                'external_auth_id' => '',
                'mfa_enforced' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'display_name' => 'Viewer',
                'description' => 'User can view books & their content behind authentication',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'system_name' => '',
                'external_auth_id' => '',
                'mfa_enforced' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'display_name' => 'Public',
                'description' => 'The role given to public visitors if allowed',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'system_name' => 'public',
                'external_auth_id' => '',
                'mfa_enforced' => 0,
            ),
        ));
        
        
    }
}