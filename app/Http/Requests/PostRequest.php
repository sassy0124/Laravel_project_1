<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'キー名' => 'ルール1|ルール2|ルール3'
            'post.title' => 'required|string|max:40',
            'post.body' => 'required|string|max:4000',
        ];
    }
}
