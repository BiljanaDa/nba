<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $teams = Team::all();
        foreach ($teams as $team) {
            $playersCount = Player::where('team_id', $team->id)->count();
            $remainingPlayers = 5 - $playersCount;
            if ($remainingPlayers > 0) {
                Player::factory()->count($remainingPlayers)->create(['team_id' => $team->id]);
            }
        }
    }
}
