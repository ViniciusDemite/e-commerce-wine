<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasUuids;

    /**
     * The products that belong to the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'cart_items', 'cart_id', 'item_id')
            ->using(CartItem::class);
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($cart) {
            $cart->items()->detach();
        });
    }
}
