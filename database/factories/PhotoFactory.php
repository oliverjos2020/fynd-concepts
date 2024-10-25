<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(3, 24),
            'url' => $this->faker->randomElement(['artisans/1.jpg','artisans/2.jpg', 'artisans/3.jpg', 'artisans/4.jpg', 'artisans/5.jpg', 'artisans/6.jpg', 'artisans/7.jpg','artisans/8.jpg', 'artisans/9.jpg', 'artisans/10.jpg', 'artisans/11.jpg']),
        ];
    }
}
