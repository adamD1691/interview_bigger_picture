<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Database\Factories\UserFactory;
use Exception;
use Illuminate\Support\Collection;

final class UserService
{
    private UserRepositoryInterface $userRepository;
    private UserFactory $userFactory;

    public function __construct(UserRepositoryInterface $userRepository, UserFactory $userFactory)
    {
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
    }

    public function index(): Collection
    {
        return $this->userRepository->getAll();
    }

    public function save(array $parameters): void
    {
        $this->userFactory->save([
            'name' => $parameters['name'],
            'email' => $parameters['email'],
            'password' => $parameters['password']
        ]);
    }

    public function find(int $id): User
    {
        $user = $this->userRepository->find($id);
        if ($user instanceof User) {
            return $user;
        }
        throw new Exception('User doesnt exist');
    }

    public function update(User $user, array $parameters): void
    {
        $this->userFactory->update($user, [
            'name' => $parameters['name'],
            'email' => $parameters['email'],
        ]);
    }

    public function delete(User $user): void
    {
        $this->userRepository->delete($user);
    }
}
