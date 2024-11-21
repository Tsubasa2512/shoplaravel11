<?php

namespace App\Services;

interface BaseServiceInterface
{
    public function getAll();
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data, $request = null);
    public function delete($id);
}
