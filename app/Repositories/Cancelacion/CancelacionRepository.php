<?php
namespace App\Repositories\Cancelacion;

use App\Models\Cancelacion\Cancelacion;
use App\Repositories\BaseRepository;
// class CancelacionRepository extends BaseRepository
class CancelacionRepository extends BaseRepository
{

    protected $model;

    public function __construct(Cancelacion $model)
    {
        $this->model = $model;
    }

    public function realSoftDelete($id) {
        $user = self::find($id);
        $user->delete();
    }
}
