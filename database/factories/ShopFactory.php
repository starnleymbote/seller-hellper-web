<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Shop::class;

    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid,
            'name' => fake()->company,
            'user_id' => User::where('role_id', 2)->get()->random()->id,

        ];
    }
}
