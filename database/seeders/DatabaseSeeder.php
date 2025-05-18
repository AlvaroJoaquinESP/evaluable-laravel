<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     //$this->call([ExampleSeeder:class]) Para cargar seeders nuevos
     $this->call([ClientSeeder::class, OrderSeeder::class]);
    }
}
