<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:Founder');
    }

    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(UserRequest $userRequest) {
        $user = User::create($userRequest->all());
        return redirect()->route('admin.users.index');
    }

    public function show(User $user) {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $userRequest, User $user) {
        $user->update($userRequest->all());
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
