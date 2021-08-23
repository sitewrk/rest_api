<?php


namespace App\Http\Controllers;

use App\Tags;
use App\Http\Requests\TagsRequest;

class TagsController extends ApiControllers
{
    public function __construct(Tags $model)
    {
        $this->model = $model;
    }
    public function createTag(TagsRequest $request)
    {
        return $this->create($request);
    }

    /**
     * HK
     *!!!!!!!!!!!!!!!!
     * Может когда-нибудь пригодится иметь доступ и к тегам отдельно ^^
     * можно расширить функционал
     *!!!!!!!!!!!!!!!!
       public function updateTag(int $entityId, TagsRequest $request)
    {
        return parent::update($entityId, $request);
    }*/

}
