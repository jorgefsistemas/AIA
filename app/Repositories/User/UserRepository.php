<?php
namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\EloquentBaseRepository;


class UserRepository extends EloquentBaseRepository implements UserRepositoryInterface

{
    public  $model;

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(User $model)
   {
       parent::__construct($model);

   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();
   }
}
