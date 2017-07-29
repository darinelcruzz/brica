<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('runa.users.index', compact('users'));
    }

    public function create()
	{
		return view('runa.users.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
            'email' => 'required|unique:users',
    		'password' => 'required',
    		'password2' => 'required|same:password',

    	]);

    	$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'pass' => $request->password,
			'level' => $request->level,
			'user' => $request->user
		]);

    	return redirect(route('runa.users'));
    }
}
