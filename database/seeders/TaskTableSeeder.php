<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Task::truncate();

        $sections = Section::all();

        $sections->each(function ($section) {
            Task::factory()->count(random_int(2, 5))->create([
                'section_id' => $section->id,
                'user_id' => $section->user_id
            ]);
        });

        Schema::enableForeignKeyConstraints();
    }
}
