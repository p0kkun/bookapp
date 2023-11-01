<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path()=='book')
        {
            return true;
        }else{
        return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'price' => 'numeric|required',
            ];
    }

    public function messages()
    {
        return [
                'title.required'=>'タイトルは必ず入力',
                'author.required'=>'著者は必ず入力',
                'price.numeric'=>'価格を整数で入力',
                'price.required'=>'価格は必ず入力',
            ];
    }
}
