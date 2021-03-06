<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
          'APIs/REST', 'CI/CD', 'Open Technologies', 'SPA'
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'id' => \Illuminate\Support\Str::uuid(),
                'name' => $category
            ]);
        }
    }
}
