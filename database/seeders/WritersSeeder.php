<?php

namespace Database\Seeders;

use App\Models\Writers;
use Illuminate\Database\Seeder;

class WritersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Writers::factory()
        ->times(3)
        ->create();
    }
}
