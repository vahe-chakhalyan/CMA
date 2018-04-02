<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        $products_array = Product::all()->pluck('id')->toArray();
        return [
            'product' => 'required|in:'  . implode(',', $products_array),
            'count' => 'required|integer|min:1'
        ];
    }
}
