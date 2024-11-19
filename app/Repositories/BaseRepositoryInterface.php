<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function create(array $data);
    public function update($id,array $data );
    public function delete($id);
    public function findById($id);
    public function all();
}
