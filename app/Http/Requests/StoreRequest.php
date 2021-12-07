<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'store_name' => 'required|unique:stores,name',
            'store_description' => 'required',
            'category_id' => 'required',
            'pic' =>'required|mimes:jpeg,jpg,png,gif|required|max:10000'
        ];
    }
}
