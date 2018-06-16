<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Angular', 'es6', 'CSS', 'HTML', 'Javascript', 'Java', 'Github', 'Gitlab', 'Git', 'VueJS', 'AngularJS',
            'PHP', 'Laravel', 'Symfony', 'React', 'Flutter', 'React Native', 'Electron', 'Bow Framework', 'NodeJS', 'Node',
            'Python', 'Ruby On Rails'
        ];

        foreach ($categories as $category) {
            \App\Models\Tag::create([
                'id' => \Illuminate\Support\Str::uuid(),
                'name' => $category
            ]);
        }
    }
}
