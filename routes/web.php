<?php

use App\Http\Controllers\Auth\LoginController;
//use App\Models\User;

use App\Http\Controllers\UsersController;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
//use Inertia\Inertia;

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {


//->with UsersController
    Route::inertia('/', 'Home');
    Route::inertia('/settings', 'Settings');
    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/create', [UsersController::class, 'create']);
    Route::post('/users', [UsersController::class, 'store']);



    //->without UsersController
//Route::get('/', function () {
//    //return view ('welcome');
//    return Inertia::render('Home');
//})
    //Route::get('/users', function () {
//    return Inertia::render('Users/Index', [
//        'time' => now()->toTimeString(),
//        'users' => User::query()
//            ->when(request('search'), function ($query, $search) { //first parameter passed as second argument
//                $query->where('name', 'like', "%{$search}%");
//            })
//            ->paginate(10)
//            ->withQueryString() // this allows to include the query string in the paginator links
//            ->through(fn($user) => [
//                'id' => $user->id,
//                'name' => $user->name,
//                'email' => $user->email,
//                'can' => [
//                    'edit' => Auth::user()->can('edit', User::class), //with the defined UserPolicy
//                ]
//        ]), // to avoid exposing sensitive data to the client, map only the attributes needed by the FE page
//        // if I need to paginate, I have to accept an object in the vue component so that I can access the pagination data, and map using the through method,
//        // which does not break the pagination structure
//        'filters' => Request::only('search'), // this includes any "search" parameters contained in the query string in the response
//        'can' => [
//            'createUser' => Auth::user()->can('create', User::class), //with the defined UserPolicy
//        ]
//    ]);
//});
//
//Route::get('/users/create', function () {
//    return Inertia::render('Users/Create');
//})->can('create', 'App\Models\User');
//    //->middleware('can:create,App\Models\User'); //with the defined UserPolicy, old Laravel
//
//Route::post('/users', function () {
//    sleep(5);
//   $attributes = Request::validate([
//       'name' => ['required'],
//       'email' => ['required', 'email'],
//       'password' => ['required'],
//   ]);
//
//   User::create($attributes);
//
//   return redirect('/users');
//});
//
//Route::get('/settings', function () {
//    return Inertia::render('Settings');
//});

});
