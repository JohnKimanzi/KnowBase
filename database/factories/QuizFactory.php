<?php

namespace Database\Factories;

use App\Models\quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $choices=[$this->faker->word(),$this->faker->word(),$this->faker->word(),$this->faker->word()];
        
        return [
            'user_id'=>$this->faker->numberBetween(1,20),
            'question'=>$this->faker->sentence(7),
            'choices'=>json_encode($choices),
            'correct_choice'=>$this->faker->randomElement($choices),
            'course_id'=>$this->faker->numberBetween(1,20),
        ];
    }
}
