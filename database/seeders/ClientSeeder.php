<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client();
        $client->name = 'Cipri';
        $client->phone = '666';
        $client->prime = true;
        $client->save();

        
        $client = new Client();
        $client->name = 'AJ';
        $client->phone = '888';
        $client->prime = false;
        $client->save();

        
        $client = new Client();
        $client->name = 'JJ';
        $client->phone = '777';
        $client->prime = false;
        $client->save();

    }
}
