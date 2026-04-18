<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;

class MerchandiseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profile_id' => Profile::factory(),
            'image' => 'img/' . $faker->numberBetween(1, 10) . '.jpg',
            'merchandise_name' => $this->faker->word(),
            'brand_name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100,500),
            'explanation' => $this->faker->text(30),
            'condition' => $this->faker->numberBetween(1,4)
        ];
    }
}
