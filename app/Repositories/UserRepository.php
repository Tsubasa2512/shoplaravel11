<?php

namespace App\Repositories;

use App\Models\Roles;
use App\Repositories\BaseRepositoryInterface;
use App\Models\User;

 class UserRepository implements BaseRepositoryInterface
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function findById($id)
    {
        return $this->user->find($id);
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function update($id, array $data)
    {
        $user = $this->findById($id);
        if ($user) {
            return $user->update($data);
        }
        return;
    }

    public function delete($id)
    {

        $user = $this->findById($id);
        if ($user) {
            return $user->delete();
        }
        return;
    }

    public function getAllRoles(){
        return Roles::all();
    }

    
}
