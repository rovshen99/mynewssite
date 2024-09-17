<?php

use Illuminate\Database\Seeder;
use Database\Seeders\NewsSeeder;
use Database\Seeders\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(NewsSeeder::class);
        $this->call(UsersSeeder::class);
    }
}