<?php

namespace App\Http\Requests;

class ArticlesRequest extends ApiRequest
{
    public function rules(){
        return [
            'name' => 'required|string',
            'message' => 'required|string',
            'tags' => 'required|string'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name is required!',
            'message.required' => 'Message is required!',
            'tags.required' => 'Tags is required!'
        ];
    }
}
