<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome_evento'=>fake()->name($gender = null),
            'img_riferimento'=>'https://picsum.photos/200/300?random='.fake()->numberBetween(1,100),
            'descrizione'=>fake()->paragraph(),
            'data_pubblicazione'=>fake()->dateTimeBetween(),
        ];
    }
}
