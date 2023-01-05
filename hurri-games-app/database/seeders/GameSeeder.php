<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::factory()
            ->count(20)
            ->create();

        $categories = Category::all();
        Game::all()->each(function ($game) use ($categories) {
            $game->categories()->attach(
                //seleciona entre 1 e 4 categorias para esse jogo
                $categories->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}
