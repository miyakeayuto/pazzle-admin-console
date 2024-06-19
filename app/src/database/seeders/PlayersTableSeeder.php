<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::create([
            'name' => 'soruteiiiiiiiiii',
            'level' => 30,
            'experience_point' => 60,
            'life' => 50
        ]);
        Player::create([
            'name' => 'miyake',
            'level' => 10,
            'experience_point' => 99,
            'life' => 75
        ]);
        Player::create([
            'name' => '汐',
            'level' => 90,
            'experience_point' => 1,
            'life' => 100
        ]);
    }
}
