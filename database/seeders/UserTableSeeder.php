<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();

        User::factory()->create(['email' => 'johndoe@gmail.com']); // testing user
        User::factory(10)->create();

        Schema::enableForeignKeyConstraints();
    }
}
