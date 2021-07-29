<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    function index()
    {
        $users = User::where('user', '!=', 2)->get();

        return view('runa.users.index', compact('users'));
    }

    function create()
	{
		return view('runa.users.create');
	}

	function store(Request $request)
    {
    	dd($request->all());
    	$this->validate($request, [
    		'name' => 'required',
            'email' => 'required|unique:users',
    		'password' => 'sometimes|required|confirmed',
    	]);

    	User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'pass' => $request->password,
			'level' => $request->level,
			'user' => $request->user
		]);

    	return redirect(route('runa.user.index'));
    }

    function edit(User $user)
	{
		return view('runa.users.edit', compact('user'));
	}

	function update(Request $request, User $user)
    {
    	// dd($request->all());
    	$request->validate([
    		'name' => 'required',
            'email' => 'required',
    		'password' => 'sometimes|required|confirmed',
    	]);

    	$user->update([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'pass' => $request->password,
			'level' => $request->level,
		]);

    	return redirect(route('runa.user.index'));
    }
}
