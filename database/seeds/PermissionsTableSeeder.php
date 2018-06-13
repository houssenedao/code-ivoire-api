<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'CREATE ROLE', 'UPDATE ROLE', 'DELETE ROLE', 'RESTORE ROLE',
            'CREATE PERMISSION', 'UPDATE PERMISSION', 'DELETE PERMISSION', 'RESTORE PERMISSION',
            'CREATE CATEGORY', 'UPDATE CATEGORY', 'DELETE CATEGORY', 'RESTORE CATEGORY',
            'CREATE TAG', 'UPDATE TAG', 'DELETE TAG', 'RESTORE TAG',
            'CREATE EVENT', 'UPDATE EVENT', 'DELETE EVENT', 'RESTORE EVENT',
            'CREATE REVIEW', 'UPDATE REVIEW', 'DELETE REVIEW', 'RESTORE REVIEW',
            'CREATE MEDIA', 'UPDATE MEDIA', 'DELETE MEDIA', 'RESTORE MEDIA',
            'CREATE ARTICLE', 'UPDATE ARTICLE', 'DELETE ARTICLE', 'RESTORE ARTICLE',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'id' => Str::uuid(),
                'name' => $permission
            ]);
        }
    }
}
