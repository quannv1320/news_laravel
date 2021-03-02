<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
                'required',
                'min:5',
            ],
            'image' => [
                'required',
            ],
            'short_desc' => [
                'required',
                'min:5',
            ],
            'author' => [
                'required',
                'min:5',
            ],
            'content' => [
                'required',
                'min:5',
            ],

        ];
    }

    public function messages()
    {
        return [
            'title.required'=>"Hãy nhập tiêu đề",
            'title.min'=>"Tiêu đề lớn hơn 5 ký tự",

            'image.required'=>"Hãy thêm ảnh",

            'short_desc.required'=>"Hãy nhập miêu tả",
            'short_desc.min'=>"Miêu tả phải lớn hơn 5 ký tự",

            'content.required'=>"Hãy nhập nội dung",
            'content.min'=>"Nội dung hơn 5 ký tự",

            'title.required'=>"Hãy nhập tiêu đề",
            'title.min'=>"Tiêu lớn hơn 5 ký tự",
    
            'author.required'=>"Hãy nhập tên tác giả",
            'author.min'=>"Tên tác giả phải lớn hơn 10 ký tự",           
        ];
    }
}
