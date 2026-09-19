<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:30',
            'customer_email' => 'nullable|email|max:255',
            'items' => 'required|array|min:1',
            'items.*.name' => 'required|string|max:255',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.qty' => 'required|integer|min:1',
        ]);

        $total = collect($validated['items'])->sum(fn($item) => $item['price'] * $item['qty']);

        $order = Order::create([
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_email' => $validated['customer_email'] ?? null,
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($validated['items'] as $item) {
            $order->items()->create([
                'item_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['qty'],
            ]);
        }

        return response()->json([
            'success' => true,
            'order_id' => $order->id,
        ]);
    }
}
