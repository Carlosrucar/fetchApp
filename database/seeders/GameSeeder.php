<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $platforms = ['PC', 'PS5', 'Xbox Series X', 'Nintendo Switch'];
        
        for ($i = 0; $i < 20; $i++) {
            Game::create([
                'name' => fake()->words(3, true),
                'price' => fake()->randomFloat(2, 10, 70),
                'platform' => fake()->randomElement($platforms)
            ]);
        }
    }
}