<?php
namespace App\Services;
use App\Models\Order;
use Illuminate\Support\Facades\Http;

class OrderService {
    public function getOrders() {
        $response = Http::withHeaders([
            'API-KEY' => env('EASYBIT_API_KEY'),
        ])->get('https://api.easybit.com/orders', [
            'limit' => 100
        ]);

        if ($response->successful()) {
            $orders = $response->json();

            return $orders['data'];
        } else {
            return [];
        }
    }

    public function getById($orderId) {
        $order = Order::where('order_id', $orderId)->first();

        if (!$order) {
            throw new \Exception('Order not found');
        }

        return $order;
    }
}
