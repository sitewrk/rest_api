<?php


namespace App\Http\Controllers;

use App\Article;
use App\Articles;
use App\Articles_tags;
use App\Tags;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


/**
 * HK
 *!!!!!!!!!!!!!!!!
 * Может когда-нибудь пригодится иметь доступ и к тегам отдельно, для этого общие функции вынесены в  ApiControllers ^^
 *!!!!!!!!!!!!!!!!
 */
final class ArticlesController extends ApiControllers
{
    public function __construct(Articles $model)
    {
        $this->model = $model;
    }

    public function createArticle(ArticlesRequest $request) {
        $datas=$request->validated();
        $id = Articles::create($datas)->id;

       $temptags = explode(' ',$datas['tags']);
        foreach ($temptags as $temptag) {
               $temptag=strtolower($temptag);
            if (Tags::where('tag', $temptag)->first()) {
                $datatag=Tags::where('tag', $temptag)->first();
                $tagsta = new Articles_tags();
                $tagsta->tag_id = $datatag->id;
                $tagsta->article_id = $id;
                $tagsta->save();
            } else {
                $idtag = Tags::create(['tag'=>$temptag])->id;
                  $tagshsdfsdfk = new Articles_tags();
                  $tagshsdfsdfk->article_id = $id;
                  $tagshsdfsdfk->tag_id = $idtag;
                  $tagshsdfsdfk->save();

           }
        }
        return $this->sendResponse(null, 'Created', 201);

    }

    public function listArticles(string $entityName) {
        $entityName=strtolower($entityName);
        $entity = Tags::where('tag',$entityName)->first();
        if (!$entity) {
            return $this->sendError('Not Found Tag', 404);
        }
        $tagstoa = Articles_tags::where('tag_id',$entity['id'])->get();
        $stack = array();
        foreach ($tagstoa as $toa) {
            array_push($stack, $toa['article_id']);
        }
        $result= Articles::find($stack);
        return $this->sendResponse($result, 'OK', 200);

    }

    public function detail(int $entityId) {
         $entity = $this->model->find($entityId);
        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }
        return $this->sendResponse($entity, 'OK', 200);
    }

    public function delete(int $entityId) {
        $entity = $this->model->find($entityId);
        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }
        $entity->delete();
        return $this->sendResponse(null, 'Deleted', 204);

    }

    public function updateArticle(int $entityId, ArticlesRequest $request)
    {
        $entity = $this->model->find($entityId)->first();
        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }
        $data=$request->validated();
        $old_tags=$entity['tags'];
        $entity->message = $data['message'];
        $entity->name = $data['name'];
        $entity->tags = $data['tags'];
        $entity->save();
        if ($old_tags!==$request['tags']) {
            Articles_tags::where('article_id', $entity['id'])->delete();
            $temptags = explode(' ', $entity['tags']);
            foreach ($temptags as $temptag) {
                $temptag = strtolower($temptag);
                if (Tags::where('tag', $temptag)->first()) {
                    $datatag = Tags::where('tag', $temptag)->first();
                    $tagsta = new Articles_tags();
                    $tagsta->tag_id = $datatag->id;
                    $tagsta->article_id = $entity['id'];
                    $tagsta->save();
                } else {
                    $idtag = Tags::create(['tag' => $temptag])->id;
                    $tagshsdfsdfk = new Articles_tags();
                    $tagshsdfsdfk->article_id = $entity['id'];
                    $tagshsdfsdfk->tag_id = $idtag;
                    $tagshsdfsdfk->save();
                }
            }
        }
        return $this->sendResponse(null, 'Updated', 204);
    }
}

