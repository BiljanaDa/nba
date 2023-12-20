<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Player::factory(12)->create();
    }
}
