<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\ItemUpdateRequest;
use App\Models\Item;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    /**
     * Update the specified item in storage.
     *
     * @param  \Illuminate\Http\Request\Item\ItemUpdateRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, Item $item): Response
    {
        $item->update($request->validated());

        return response()->noContent();
    }
}
