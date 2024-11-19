<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\BaseServiceInterface;


class UserService implements BaseServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAll()
    {
        return $this->userRepository->all();
    }
    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }
    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }
    public function update($id, array $data)
    {
        $user = $this->userRepository->findById($id);
        if ($user) {
            return $user->update($data);
        }
        return;
    }
    public function delete($id)
    {
        $user = $this->userRepository->findById($id);
        if ($user) {
            return $user->delete();
        }
        return;
    }

    public function getAllRoles()
    {
        return $this->userRepository->getAllRoles();
    }
    // public function deleteList(array $ids) {


    // }
}
