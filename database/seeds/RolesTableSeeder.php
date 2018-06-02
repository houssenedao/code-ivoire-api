<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'SUPER_ADMIN',
                'label' => ''
            ],
            [
                'name' => 'ADMIN',
                'label' => ''
            ],
            [
                'name' => 'MODERATOR',
                'label' => ''
            ],
            [
                'name' => 'USER',
                'label' => ''
            ],
            [
                'name' => 'WRITER',
                'label' => ''
            ],
        ];
    }
}
