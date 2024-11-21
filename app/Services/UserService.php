<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\BaseServiceInterface;

use Illuminate\Support\Facades\Hash;

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
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }
    public function update($id, array $data, $request = null)
    {
        $user = $this->userRepository->findById($id);
        if ($user) {
            if (isset($data['password']) && !empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }
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
