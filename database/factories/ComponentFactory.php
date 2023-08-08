<?php

namespace Database\Factories;

use App\Models\Component;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Component>
 */
class ComponentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'      => fake()->name(),
            'html'      => '<a class="uk-button uk-button-primary">' . fake()->word() . '</a>',
            'overrides' => '$button-primary-background: ' . fake()->hexColor() . ';',
            'scss'      => '',
            'css'       => '',
            'theme'     => fake()->randomElement(['light', 'dark']),
        ];
    }
}
