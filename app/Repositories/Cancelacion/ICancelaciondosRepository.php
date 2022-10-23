<?php
namespace App\Repositories\Cancelacion;


interface ICancelaciondosRepository
{
    public function getAllUsers();

    public function create($data);

    public function getUserById($id);

    public function createOrUpdate( $id = null, $collection = [] );

    public function deleteUser($id);
}
