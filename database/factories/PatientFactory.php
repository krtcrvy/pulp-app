<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 4,
            'first_name' => 'Kurt Carvey',
            'last_name' => 'Cadenas',
            'email' => 'kurtcarveycadenas1401@gmail.com',
            'birthday' => '2001-11-14',
            'gender' => 'male',
            'contact_number' => '09772880178',
            'address' => 'Caloocan City'
        ];
    }
}
