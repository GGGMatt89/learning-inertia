<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    //return view ('welcome');
    return Inertia::render('Home');
});

Route::get('/users', function () {
    return Inertia::render('Users', [
        'time' => now()->toTimeString(),
        'users' => User::query()
            ->when(request('search'), function ($query, $search) { //first parameter passed as second argument
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString() // this allows to include the query string in the paginator links
            ->through(fn($user) => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]), // to avoid exposing sensitive data to the client, map only the attributes needed by the FE page
        // if I need to paginate, I have to accept an object in the vue component so that I can access the pagination data, and map using the through method,
        // which does not break the pagination structure
        'filters' => Request::only('search') // this includes any "search" parameters contained in the query string in the response
    ]);
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
    dd('logging the user out');
});
