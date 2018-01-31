<?php

namespace App\Repositories;

use App\Driver;


class DriverRepository 
{
    protected $entity;

    public function __construct(Driver $entity)
    {
        $this->entity = $entity;
    }

    public function getAllWithTrashed(int $pageSize)
    {
        return $this->entity
        ->withTrashed()
        ->orderBy('city', 'desc')
        ->paginate($pageSize);
    }

    public function store(array $data)
    {
        return $this->entity->create($data);
    }

    public function edit(int $id)
    {
        return $this->entity->find($id);
    }

    public function update($id, $data)
    {
        return $this->entity->find($id)->update($data);
    }

    public function destroy(int $id)
    {
        return $this->entity->find($id)->delete();
    }

    public function restore(int $id)
    {
        return $this->entity->onlyTrashed()->find($id)->restore();
    }
}