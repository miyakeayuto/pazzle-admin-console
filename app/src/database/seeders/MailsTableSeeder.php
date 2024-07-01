<?php

namespace Database\Seeders;

use App\Models\Mail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mail::create([
            'text' => 'サーバーメンテナンスのご協力ありがとうございました。',
            'item_id' => 1,
            'amount' => 5
        ]);

        Mail::create([
            'text' => 'アニメ放送記念のプレゼントです。',
            'item_id' => 2,
            'amount' => 6
        ]);

        Mail::create([
            'text' => '20周年記念のプレゼントです。',
            'item_id' => 3,
            'amount' => 1
        ]);
    }
}
