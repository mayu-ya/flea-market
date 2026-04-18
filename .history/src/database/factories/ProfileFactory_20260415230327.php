<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Modes\User;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory,
            'profile_img' => 'img/' . faker->numberBetween(1, 10) . '.jpg',
            'name' => $this->faker->name(),
            'post_code' => $this->faker->randomnumber(3) . '-' . $this->faker->randomnumber(3),
            'address' => $this->faker->country(),
            'building' => $this->faker->city()
        ];
    }
}
