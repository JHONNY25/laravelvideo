<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();

        return [
            'name' => $this->faker->name(),
            'description' => 'description test',
            'url' => 'https://www.youtube.com/embed/7PIji8OubXU?si=5d8jqKcbL88bjT__',
            'user_id' => $user['id'],
        ];
    }
}
