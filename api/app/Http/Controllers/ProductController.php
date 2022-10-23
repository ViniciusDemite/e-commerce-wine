<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $products = Product::all();

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request\ProductStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request): Response
    {
        Product::create($request->validated());

        return response()->noContent();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show(Product $product): JsonResource
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request\ProductUpdateRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product): Response
    {
        $product->update($request->validated());

        return response()->noContent();
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product): Response
    {
        $product->delete();

        return response()->noContent();
    }
}
