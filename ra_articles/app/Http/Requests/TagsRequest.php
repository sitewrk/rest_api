<?php


namespace App\Http\Requests;


/**
 * HK
 *!!!!!!!!!!!!!!!!
 * Может когда-нибудь пригодится иметь доступ и к тегам отдельно ^^
 *!!!!!!!!!!!!!!!!
 */
class TagsRequest  extends ApiRequest
{
    public function rules(){
        return [
            'tag' => 'required|string'
        ];
    }
    public function messages(){
        return [
            'tag.required' => 'Tags is required!'
        ];
    }
}
