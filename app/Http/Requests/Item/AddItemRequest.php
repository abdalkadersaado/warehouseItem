<?php

namespace App\Http\Requests\Item;

use Illuminate\Foundation\Http\FormRequest;

class AddItemRequest extends FormRequest
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
            'name' => 'required',
            'commercial_name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ];
    }
}
