<?php

namespace Database\Seeders;

use App\Models\Dog;
use App\Models\User;
use Illuminate\Database\Seeder;

class DogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        Dog::factory(3)->create();
    }
}
