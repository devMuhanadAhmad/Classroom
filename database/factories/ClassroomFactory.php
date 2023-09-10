<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

             'name'=>$this->faker->name(),
             'user_id'=>$this->faker->randomElement(User::pluck('id')),
             'section'=>$this->faker->name(),
             'subject'=>$this->faker->name(),
             'room'=>$this->faker->name(),
             'code'=>Str::random(10),
             'them'=>$this->faker->sentence(2),
             'cover_image_path'=>'classroom/man-with-laptop-light.png',

        ];
    }
}
