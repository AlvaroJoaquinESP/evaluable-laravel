<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = new Order();
        $order->status = 'PAID';
        $order->sale_date = '2025-05-08';
        $order->articles_id = '311';
        $order->amount = 0.4;
        $order->client_id = 1;
        $order->save();

        $order = new Order();
        $order->status = 'PROCESSED';
        $order->sale_date = '2025-06-08';
        $order->articles_id = '68';
        $order->amount = 0.8;
        $order->client_id = 1;
        $order->save();

    }
}
