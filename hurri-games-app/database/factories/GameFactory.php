<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dev_user_id' => 2,
            'name' => fake()->streetName(),
            'description' => fake()->text(100),
            'released_at' => fake()->date(),
            'normal_price' => fake()->randomNumber(2),
            'languages' => json_encode(fake()->randomElements(['PT-BR','ENG-USA','SPA','GER'],2)),
            'operational_system' => fake()->randomElement(['Windows 7','Windows 8', 'Windows 10', 'Windows 11']),
            'processor' => fake()->randomElement(['Intel Core I7','Intel Core I5', 'Intel Core I3', 'Intel Dual Core']),
            'graphics_card' => fake()->randomElement(['RTX 3050','RTX 3090', 'GTX 1650', 'RTX 360 TI']),
            'directx' => fake()->randomElement(['Versão 8.1','Versão 9.0a', 'Versão 11.0', 'Versão 12.0']),
            'storage' => fake()->numberBetween(50,500),
            'memory' => fake()->numberBetween(1,32),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
