<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductStoreRequest extends FormRequest
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
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => [
                'required',
                'string'
            ],
            "slug" => [
                'required',
                'string',
                'unique:App\Models\Product,slug'
            ],
            "weight" => [
                'required',
                'numeric'
            ],
            "category_id" => [
                'required',
                'numeric',
                'exists:App\Models\Category,id'
            ]
        ];
    }
}
