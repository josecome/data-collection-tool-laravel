<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFormMetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'form_name' => $this->faker->realText($maxNbChars = 80),
            'form_description' => $this->faker->realText($maxNbChars = 140),
            'form_country' =>$this->faker->realText($maxNbChars = 60),
            'form_field' => $this->faker->realText($maxNbChars = 80),
            'form_status' => array('deployed', 'draft', 'arquived')[rand(0, 2)],
            'user_id' => 1,
        ];
    }
}
