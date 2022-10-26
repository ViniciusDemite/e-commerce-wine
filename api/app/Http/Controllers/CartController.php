<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\CartStoreRequest;
use App\Http\Requests\Cart\CartUpdateRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class CartController extends Controller
{
    /**
     * Store a newly created cart in storage.
     *
     * @param  \Illuminate\Http\Request\Cart\CartStoreRequest  $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function store(CartStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if (!$request->has('cart_id') || $request->get('cart_id') === null) {
            $cart = Cart::create();
        } else {
            $cart = Cart::where('id', $validated['cart_id'])->firstOrFail();
        }

        $item = Item::create($validated);
        $cart->items()->attach($item->id);

        $cart->load("items");

        // return new CartResource($cart);
        return response()->json([
            "id" => $cart->id
        ]);
    }

    /**
     * Display the specified cart.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(Cart $cart): JsonResource
    {
        $cart->load("items");

        return new CartResource($cart);
    }

    /**
     * Remove the specified cart from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, Item $item): Response
    {
        $cart->items()->detach($item->id);
        $item->delete();

        if (count($cart->items) === 0) {
            $cart->delete();

            return response()->noContent();
        }

        return response()->noContent();
    }
}
