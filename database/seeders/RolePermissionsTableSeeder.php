<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_permissions')->delete();
        
        \DB::table('role_permissions')->insert(array (
            0 => 
            array (
                'id' => 19,
                'name' => 'settings-manage',
                'display_name' => 'Manage Settings',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            1 => 
            array (
                'id' => 20,
                'name' => 'users-manage',
                'display_name' => 'Manage Users',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            2 => 
            array (
                'id' => 21,
                'name' => 'user-roles-manage',
                'display_name' => 'Manage Roles & Permissions',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            3 => 
            array (
                'id' => 22,
                'name' => 'restrictions-manage-all',
                'display_name' => 'Manage All Entity Permissions',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            4 => 
            array (
                'id' => 23,
                'name' => 'restrictions-manage-own',
                'display_name' => 'Manage Entity Permissions On Own Content',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            5 => 
            array (
                'id' => 24,
                'name' => 'book-create-all',
                'display_name' => 'Create All Books',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            6 => 
            array (
                'id' => 25,
                'name' => 'book-create-own',
                'display_name' => 'Create Own Books',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            7 => 
            array (
                'id' => 26,
                'name' => 'book-update-all',
                'display_name' => 'Update All Books',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            8 => 
            array (
                'id' => 27,
                'name' => 'book-update-own',
                'display_name' => 'Update Own Books',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            9 => 
            array (
                'id' => 28,
                'name' => 'book-delete-all',
                'display_name' => 'Delete All Books',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            10 => 
            array (
                'id' => 29,
                'name' => 'book-delete-own',
                'display_name' => 'Delete Own Books',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            11 => 
            array (
                'id' => 30,
                'name' => 'page-create-all',
                'display_name' => 'Create All Pages',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            12 => 
            array (
                'id' => 31,
                'name' => 'page-create-own',
                'display_name' => 'Create Own Pages',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            13 => 
            array (
                'id' => 32,
                'name' => 'page-update-all',
                'display_name' => 'Update All Pages',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            14 => 
            array (
                'id' => 33,
                'name' => 'page-update-own',
                'display_name' => 'Update Own Pages',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            15 => 
            array (
                'id' => 34,
                'name' => 'page-delete-all',
                'display_name' => 'Delete All Pages',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            16 => 
            array (
                'id' => 35,
                'name' => 'page-delete-own',
                'display_name' => 'Delete Own Pages',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            17 => 
            array (
                'id' => 36,
                'name' => 'chapter-create-all',
                'display_name' => 'Create All Chapters',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            18 => 
            array (
                'id' => 37,
                'name' => 'chapter-create-own',
                'display_name' => 'Create Own Chapters',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            19 => 
            array (
                'id' => 38,
                'name' => 'chapter-update-all',
                'display_name' => 'Update All Chapters',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            20 => 
            array (
                'id' => 39,
                'name' => 'chapter-update-own',
                'display_name' => 'Update Own Chapters',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            21 => 
            array (
                'id' => 40,
                'name' => 'chapter-delete-all',
                'display_name' => 'Delete All Chapters',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            22 => 
            array (
                'id' => 41,
                'name' => 'chapter-delete-own',
                'display_name' => 'Delete Own Chapters',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            23 => 
            array (
                'id' => 42,
                'name' => 'image-create-all',
                'display_name' => 'Create All Images',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            24 => 
            array (
                'id' => 43,
                'name' => 'image-create-own',
                'display_name' => 'Create Own Images',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            25 => 
            array (
                'id' => 44,
                'name' => 'image-update-all',
                'display_name' => 'Update All Images',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            26 => 
            array (
                'id' => 45,
                'name' => 'image-update-own',
                'display_name' => 'Update Own Images',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            27 => 
            array (
                'id' => 46,
                'name' => 'image-delete-all',
                'display_name' => 'Delete All Images',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            28 => 
            array (
                'id' => 47,
                'name' => 'image-delete-own',
                'display_name' => 'Delete Own Images',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            29 => 
            array (
                'id' => 48,
                'name' => 'book-view-all',
                'display_name' => 'View All Books',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            30 => 
            array (
                'id' => 49,
                'name' => 'book-view-own',
                'display_name' => 'View Own Books',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            31 => 
            array (
                'id' => 50,
                'name' => 'page-view-all',
                'display_name' => 'View All Pages',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            32 => 
            array (
                'id' => 51,
                'name' => 'page-view-own',
                'display_name' => 'View Own Pages',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            33 => 
            array (
                'id' => 52,
                'name' => 'chapter-view-all',
                'display_name' => 'View All Chapters',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            34 => 
            array (
                'id' => 53,
                'name' => 'chapter-view-own',
                'display_name' => 'View Own Chapters',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            35 => 
            array (
                'id' => 54,
                'name' => 'attachment-create-all',
                'display_name' => 'Create All Attachments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            36 => 
            array (
                'id' => 55,
                'name' => 'attachment-create-own',
                'display_name' => 'Create Own Attachments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            37 => 
            array (
                'id' => 56,
                'name' => 'attachment-update-all',
                'display_name' => 'Update All Attachments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            38 => 
            array (
                'id' => 57,
                'name' => 'attachment-update-own',
                'display_name' => 'Update Own Attachments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            39 => 
            array (
                'id' => 58,
                'name' => 'attachment-delete-all',
                'display_name' => 'Delete All Attachments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            40 => 
            array (
                'id' => 59,
                'name' => 'attachment-delete-own',
                'display_name' => 'Delete Own Attachments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            41 => 
            array (
                'id' => 60,
                'name' => 'comment-create-all',
                'display_name' => 'Create All Comments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            42 => 
            array (
                'id' => 61,
                'name' => 'comment-create-own',
                'display_name' => 'Create Own Comments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            43 => 
            array (
                'id' => 62,
                'name' => 'comment-update-all',
                'display_name' => 'Update All Comments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            44 => 
            array (
                'id' => 63,
                'name' => 'comment-update-own',
                'display_name' => 'Update Own Comments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            45 => 
            array (
                'id' => 64,
                'name' => 'comment-delete-all',
                'display_name' => 'Delete All Comments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            46 => 
            array (
                'id' => 65,
                'name' => 'comment-delete-own',
                'display_name' => 'Delete Own Comments',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            47 => 
            array (
                'id' => 66,
                'name' => 'bookshelf-view-all',
                'display_name' => 'View All BookShelves',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            48 => 
            array (
                'id' => 67,
                'name' => 'bookshelf-view-own',
                'display_name' => 'View Own BookShelves',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            49 => 
            array (
                'id' => 68,
                'name' => 'bookshelf-create-all',
                'display_name' => 'Create All BookShelves',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            50 => 
            array (
                'id' => 69,
                'name' => 'bookshelf-create-own',
                'display_name' => 'Create Own BookShelves',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            51 => 
            array (
                'id' => 70,
                'name' => 'bookshelf-update-all',
                'display_name' => 'Update All BookShelves',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            52 => 
            array (
                'id' => 71,
                'name' => 'bookshelf-update-own',
                'display_name' => 'Update Own BookShelves',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            53 => 
            array (
                'id' => 72,
                'name' => 'bookshelf-delete-all',
                'display_name' => 'Delete All BookShelves',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            54 => 
            array (
                'id' => 73,
                'name' => 'bookshelf-delete-own',
                'display_name' => 'Delete Own BookShelves',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            55 => 
            array (
                'id' => 74,
                'name' => 'templates-manage',
                'display_name' => 'Manage Page Templates',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            56 => 
            array (
                'id' => 75,
                'name' => 'access-api',
                'display_name' => 'Access system API',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            57 => 
            array (
                'id' => 76,
                'name' => 'content-export',
                'display_name' => 'Export Content',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            58 => 
            array (
                'id' => 77,
                'name' => 'editor-change',
                'display_name' => 'Change page editor',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
            59 => 
            array (
                'id' => 78,
                'name' => 'receive-notifications',
                'display_name' => 'Receive & Manage Notifications',
                'description' => NULL,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ),
        ));
        
        
    }
}