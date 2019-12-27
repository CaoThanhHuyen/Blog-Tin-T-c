<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Validator;

class PostRequest extends FormRequest
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
            'title' => [
                "required",
                "min:2",
                "max:255",
                Rule::unique('posts')->ignore($this->post),
            ],
            'text' => 'required|min:2',
            'image' => [
                "image",
                "mimes:jpeg,png,jpg,gif,svg",
                "max:2048"
            ], 
        ];
    }
}
