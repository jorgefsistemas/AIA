<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

abstract class BaseRepository
{
    //abstract public function getModel();
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find(decrypt($id));
    }
    public function getAll()
    {
       return $this->model->get();
    }
    public function create($data)
    {
        try {
            $object = $this->model->create($data);
            return $object;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "No se puede guardar el registro. {$e->getMessage()} ",
            ], 500);
        }
    }
    public function crear($data)
    {
        if($data) {
            return $this->model::create($data);
        }else return false;
    }

    public function update($id, $data)
    {
        $object = $this->model->find(decrypt($id));
        $object->update($data);
        return $object;
    }


    public function show($id)
    {
        return $this->model->find(decrypt($id));
    }

    public function delete($id)
    {
        $registry = $this->model->find(decrypt($id));
        return $registry->delete();
    }

    public function paginate($id)
    {
        return $this->model->paginate($id);
    }
}
