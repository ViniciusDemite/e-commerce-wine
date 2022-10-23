<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if ($this->exists('slug')) {
            $this->merge([
                'slug' => Str::slug($this->slug),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Product $product)
    {
        return [
            "name" => [
                'nullable',
                'string'
            ],
            "slug" => [
                'nullable',
                'string',
                Rule::unique('App\Models\Product')->ignore($product->id)
            ],
            "weight" => [
                'nullable',
                'numeric'
            ],
            "category_id" => [
                'nullable',
                'numeric',
                'exists:App\Models\Category,id'
            ]
        ];
    }
}
