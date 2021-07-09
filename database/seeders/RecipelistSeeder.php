<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipelist;

class RecipelistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipelist::factory()
            ->count(10)
            ->create();
    }
}
