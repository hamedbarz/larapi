<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Episode;
use App\Models\User;
use Carbon\Factory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

use function Psy\debug;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create()->each(function($user){
            Course::factory(5)->create(['user_id' => $user->id])->each(function ($cource){
                Episode::factory(rand(6, 20))->make()->each(function($episode, $key) use ($cource){
                    $episode->number = $key + 1;
                    $cource->episodes()->save($episode);
                });
            });
        });

    }
}
