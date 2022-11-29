<?php

namespace Database\Factories;

use App\Models\AssessmentAttempt;
use App\Models\GeneratedCertificate;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeneratedCertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GeneratedCertificate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
          
            // 'assessment_attempt_id'=> $this->faker->numberBetween(1,283),
            'status'=>'verified',
            'verification_date'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'user_id'=> $this->faker->numberBetween(1, 12),
            'url'=>'cert.jpg',
            
        ];
    }
}
