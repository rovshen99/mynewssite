<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 12; $i++) {
            News::create([
                'name' => 'Новость ' . $i,
                'description' => 'Описание новости ' . $i,
                'image' => 'images/news/image1.jpg',
                'author' => 'Автор ' . $i,
            ]);
        }
    }
}