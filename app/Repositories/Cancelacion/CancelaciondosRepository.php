<?php
namespace App\Repositories\Cancelacion;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cancelacion\Cancelacion;
use App\Repositories\Cancelacion\ICancelaciondosRepository;

class CancelaciondosRepository implements ICancelaciondosRepository
{
    protected $cancelacion = null;

    protected $model;

    public function __construct(Cancelacion $model){
        $this->model = $model;
    }

    public function getAllUsers()
    {
        return $this->model->get();
    }

    public function getUserById($id)
    {
        return $this->model::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {

    }
    public function create($data)
    {
        if($data) {
            return $this->model::create($data);
        }else return false;
    }

    public function deleteUser($id)
    {
        return $this->model::find($id)->delete();
    }
}
