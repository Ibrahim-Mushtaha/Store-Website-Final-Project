<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'category_name' => 'required|unique:categories,name',
            'pic' =>'required|mimes:jpeg,jpg,png,gif|required|max:10000'
        ];
    }

}
