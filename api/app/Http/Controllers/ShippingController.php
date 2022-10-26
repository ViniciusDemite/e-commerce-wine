<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRequest;
use App\Models\Cart;
use Illuminate\Http\JsonResponse;

class ShippingController extends Controller
{
    /**
     * Calculate shipping.
     *
     * @param  \App\Models\Cart  $cart
     * @param  \App\Http\Requests\ShippingRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Cart $cart, ShippingRequest $request): JsonResponse
    {
        $cart->load("items");

        $total = $this->calculate_shipping($cart->items->toArray(), $request->distance);

        return response()->json([
            "total" => $total
        ]);
    }

    private function calculate_shipping(array $items, int $distance)
    {
        $weight_value = $this->calculate_order_weight_value($items);

        if ($distance <= 1000) {
            return $weight_value;
        }

        return ($weight_value * $distance) / 100;
    }

    private function calculate_order_weight_value(array $items)
    {
        $weights = array_map(
            fn ($item): int => $item["product"]["weight"],
            $items
        );
        $total_weight = array_sum($weights);

        return $total_weight * 5;
    }
}
