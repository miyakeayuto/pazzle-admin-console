<?php

namespace Database\Seeders;

use App\Models\HaveItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Have_ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HaveItem::create([
            'player_name' => 'soruteiiiiiiiiii',
            'item_name' => '回復薬グレート',
            'possession' => 10,
        ]);

        HaveItem::create([
            'player_name' => 'miyake',
            'item_name' => '秘薬',
            'possession' => 2,
        ]);

        HaveItem::create([
            'player_name' => '汐',
            'item_name' => 'エンプレスグリーヴ',
            'possession' => 1,
        ]);

        HaveItem::create([
            'player_name' => '汐',
            'item_name' => 'ドラゴンヘッド',
            'possession' => 1,
        ]);
    }
}
