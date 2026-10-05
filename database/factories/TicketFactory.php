<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5),
            'description' => fake()->paragraph(),
            'priority' => fake()->randomElement(['low', 'normal', 'high', 'critical']),
            'status' => 'nouveau',
            'user_id' => User::where('role', 'employe')->inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'assigned_to' => null,
            'deadline' => null,
            'attachment' => null,
        ];
    }
}
