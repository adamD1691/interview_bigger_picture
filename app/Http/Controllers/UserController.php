<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): View
    {
        $users = $this->userService->index();
        return view('user.index', ['users' => $users]);
    }

    public function create(): View
    {
        return view('user.create');
    }

    public function save(UserCreateRequest $request): RedirectResponse
    {
        $this->userService->save($request->only(['name', 'email', 'password']));
        return redirect('/');
    }

    public function edit(User $user): View
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(User $user, UserUpdateRequest $request): RedirectResponse
    {
        $this->userService->update($user, $request->only(['name', 'email']));
        return redirect('/');
    }

    public function delete(User $user): RedirectResponse
    {
        $this->userService->delete($user);
        return redirect('/');
    }
}
