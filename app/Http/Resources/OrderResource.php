<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'status' => $this->status,
            'send' => $this->send,
            'receive' => $this->receive,
            'amount' => $this->amount,
            'send_address' => $this->send_address,
            'receive_address' => $this->receive_address,
        ];
    }
}
