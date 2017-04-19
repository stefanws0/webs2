<?php

namespace App\Http\Requests\Product;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'name' => 'required|max:20',
            'description' => 'required|max:50',
            'price' => 'required|max:6'
        ];
    }

    public function persist()
    {
        $product = $this->products()->create($this->only('name', 'description', 'price'));


        return $product;
    }
}
