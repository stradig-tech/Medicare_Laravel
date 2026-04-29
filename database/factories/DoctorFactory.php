<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => \Illuminate\Support\Facades\Hash::make('123456'),
            'dob' => $this->faker->date(),
            'role' => 'doctor',
            'gender' => $this->faker->randomElement(['male', 'female']),
            'qualification' => 'MBBS',
            'specialization' => $this->faker->randomElement(['surgeon', 'orthopedics', 'dentist']),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'nid' => $this->faker->numerify('##############'),
        ];
    }
}
