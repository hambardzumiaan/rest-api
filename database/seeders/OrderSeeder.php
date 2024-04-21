<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderService = new OrderService();
        $orders = $orderService->getOrders();

        foreach ($orders as $order) {
            // It's wrong in loop create a row :) , it's just seeder (example)
            Order::create([
                'user_id' => 1,
                'order_id' => $order['id'],
                'send' => $order['send'],
                'receive' => $order['receive'],
                'status' => $order['status'],
                'amount' => $order['receiveAmount'],
                'send_address' => $order['sendAddress'],
                'receive_address' => $order['receiveAddress'],
            ]);
        }
    }
}
