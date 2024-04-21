<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * User login
     */
    public function login()
    {
        $user = Auth::user();
        $orders = $user->orders;

        return new OrderResource($orders);
    }
}
