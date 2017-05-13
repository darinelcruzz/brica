<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CreateUserController extends Controller
{
public function create()
	{
		return view('users.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
            'user' => 'required|unique:users',
    		'password' => 'required',
    		'password2' => 'required|same:password',

    	]);

    	$user = User::create($request->all());

    	return redirect(route('user.show'));
    }
}
