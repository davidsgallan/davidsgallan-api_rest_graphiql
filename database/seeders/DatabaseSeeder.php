<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Quest;
use App\Models\Products;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Products::factory(10)->create();
    }
}