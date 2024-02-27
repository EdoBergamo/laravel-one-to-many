<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Project::create([
            'name' => 'html-css-bootstrap-dashboard',
            'owner_avatar_url' => 'https://avatars.githubusercontent.com/u/147630264?v=4',
            'html_url' => 'https://github.com/EdoBergamo/html-css-bootstrap-dashboard',
            'description' => null,
        ]);
    }
}
