<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class AbstractRepository
{
    protected Model $model;

    public function find($id): Model
    {
        return $this->model->find($id);
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
