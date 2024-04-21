<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update order status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orderStatusUrl = 'https://api.easybit.com/orderStatus';
        $orders = Order::all();

        foreach ($orders as $order) {
            $response = Http::withHeaders([
                'API-KEY' => env('EASYBIT_API_KEY'),
            ])->get($orderStatusUrl, [
                'id' => $order->order_id,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $order->status = $data['data']['status'];
                $order->save();
            }
        }
    }
}
