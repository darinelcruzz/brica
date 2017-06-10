<?php

use App\Events\MessagePosted;
use App\User;

Auth::routes();

Route::get('/chat', function () {
    return view('chat');
});

Route::get('/messages', function () {
    return App\Message::with('user')->get();
});

Route::post('/messages', function () {
    $user = App\User::find(3);

    $message = $user->messages()->create([
        'message' => request()->get('message')
    ]);

    event(new MessagePosted($message, $user));

    return ['status' => 'Ok'];
});

Route::get('/home', 'HomeController@index');

Route::get('tests', function() {
    return view('tests');
});

Route::get('duda', function() {
	$user = User::first();
    return $user->name;
});


