<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Reader = User::factory()->create([
            'name' => 'reader',
            'email' => 'reader@gmail.nl',
            'password' => Hash::make('reader')
        ]);

        $Writer = User::factory()->create([
            'name' => 'writer',
            'email' => 'writer@gmail.nl',
            'role' => 1,
            'password' => Hash::make('writer')
        ]);

        $Admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.nl',
            'role' => 2,
            'password' => Hash::make('admin')
        ]);

    }
}