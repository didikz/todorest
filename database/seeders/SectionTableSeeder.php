<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Section::truncate();

        $users = User::all();

        $users->each(function ($user) {
            Section::factory()->count(random_int(1, 5))->create(['user_id' => $user->id]);
        });

        Schema::enableForeignKeyConstraints();
    }
}
