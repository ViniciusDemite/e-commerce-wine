<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRequest;
use App\Models\Cart;
use App\Services\ShippingService;
use Illuminate\Http\JsonResponse;

class ShippingController extends Controller
{
    /**
     * Returns the shipping total.distance
     *
     * @param  \App\Models\Cart  $cart
     * @param  \App\Http\Requests\ShippingRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Cart $cart, ShippingRequest $request): JsonResponse
    {
        $cart->load("items");
        $validated = $request->validated();

        $total = ShippingService::calculate_shipping($cart->items->toArray(), $validated['distance']);

        return response()->json([
            "total" => $total
        ]);
    }
}
