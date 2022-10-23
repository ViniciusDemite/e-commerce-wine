<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CartStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "cart_id" => [
                'nullable',
                'string'
            ],
            "quantity" => [
                'required',
                'numeric',
                'min:1'
            ],
            "product_id" => [
                'required',
                'numeric',
                'exists:App\Models\Product,id'
            ]
        ];
    }
}
