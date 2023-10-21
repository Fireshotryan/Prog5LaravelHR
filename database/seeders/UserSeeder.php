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
        $Reader->assignRole('reader');

        $Writer = User::factory()->create([
            'name' => 'writer',
            'email' => 'writer@gmail.nl',
            'password' => Hash::make('writer')
        ]);
        $Writer->assignRole('writer');

        $Admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.nl',
            'password' => Hash::make('admin')
        ]);
        $Admin->assignRole('admin');

    }
}