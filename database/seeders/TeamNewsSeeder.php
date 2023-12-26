<?php

namespace Database\Seeders;

use App\Models\NewsTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsTeam::create([
            'news_id' => 1, // Postavite odgovarajući ID vesti
            'team_id' => 1, // Postavite odgovarajući ID tima
        ]);

        NewsTeam::create([
            'news_id' => 2, // Postavite odgovarajući ID vesti
            'team_id' => 2, // Postavite odgovarajući ID tima
        ]);
    }
}
