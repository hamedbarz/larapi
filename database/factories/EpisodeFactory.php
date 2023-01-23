<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(5),
            'videoUrl' => 'https://www.learningcontainer.com/wp-content/uploads/2020/05/sample-mp4-file.mp4'
        ];
    } 

}
