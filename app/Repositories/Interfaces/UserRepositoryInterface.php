<?php


namespace App\Repositories\Interfaces;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function find(int $id): Model;

    public function getAll(): Collection;

    public function delete(User $user): void;
}
