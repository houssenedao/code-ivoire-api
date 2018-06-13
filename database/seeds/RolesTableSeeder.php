<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        foreach ($roles as $role) {
            Role::create([
               'id' => Str::uuid(),
               'name' => $role['name'],
               'label' => $role['label']
            ]);
        }
    }
}
