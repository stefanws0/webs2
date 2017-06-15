<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the product is authorized to make this request.
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
        return [
            'name' => 'required|min:2|max:100',
            'description' => 'required|min:20|max:100',
            'price' => 'required|integer|min:1'
        ];
    }

    /**
     * Update the product.
     */
    public function persist()
    {
        $user = $this->route('product');

        $user->update($this->only('name', 'description', 'price'));
    }
}
