<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
   
    protected $model = Player::class;

    public function definition(): array
    {

        $teamIds = Team::pluck('id')->toArray();
        $randomTeamId = $this->faker->randomElement($teamIds); 

        return [
            'first_name' => fake()->word(),
            'last_name' => fake()->word(),
            'email' => fake()->email(),
            'team_id' => $randomTeamId,
        ];
    }
}
