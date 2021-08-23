<?php


namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


abstract class ApiControllers extends Controller
{
    protected $request;

    protected $model;

    public function get(Request $request) {
        $limit = (int) $request->get('limit', 100);
        $offset = (int) $request->get('offset', 0);

        $result=$this->model->limit($limit)->offset($offset)->get();
        return $this->sendResponse($result, 'OK', 200);
    }

    public function update(int $entityId, Request $request) {
        $entity = $this->model->find($entityId)->first();
        if (!$entity) {
            return $this->sendError('Not Found', 404);
        }
        $data=$request->validated();
        $this->model->fill($data)->push();
        return $this->sendResponse(null, 'Updated', 204);

    }

    public function create(Request $request) {
        $data=$request->validated();
        $this->model->fill($data)->push();
        return $this->sendResponse(null, 'Created', 201);
    }

}
