<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleFormRequest extends Request
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
            'articleTitle' => 'required|min:3|max:300',
            'articleContent' => 'required|min:3|max:10000',
            'category' => 'required|min:1|max:10'
        ];
    }
}
