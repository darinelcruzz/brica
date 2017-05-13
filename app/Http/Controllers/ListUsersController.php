<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ListUsersController extends Controller
{
    public function show()
    {
    	$users = User::all();

    	return view('users.show', compact('users'));
    }
}
