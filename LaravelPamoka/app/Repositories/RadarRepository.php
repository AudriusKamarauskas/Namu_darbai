<?php

namespace App\Repositories;

use App\Radar;


class RadarRepository 
{
    protected $entity;

    public function __construct(Radar $entity)
    {
        $this->entity = $entity;
    }

    public function getAllWithTrashed(int $pageSize)
    {
        return $this->entity
        ->withTrashed()
        ->orderBy('number', 'desc')
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