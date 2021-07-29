<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    function index()
    {
        $users = User::where('user', '!=', 1)->get();

        return view('hercules.users.index', compact('users'));
    }

    function create()
	{
		return view('hercules.users.create');
	}

	function store(Request $request)
    {
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

    	return redirect(route('hercules.user.index'));
    }

    function edit(User $user)
	{
		return view('hercules.users.edit', compact('user'));
	}

	function update(Request $request, User $user)
    {
    	$attributes = $request->validate([
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

    	return redirect(route('hercules.user.index'));
    }
}
