<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Manage\CRUD
{
    public function __construct(User $user)
    {
        $this->model = $user;
        $this->rules = [
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ];
    }
}
