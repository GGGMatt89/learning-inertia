<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function index()
    {


        return Inertia::render('Users/Index', [
            'users' => UserResource::collection(User::query()->when(request()->input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()),
//                ->through(fn($user) => [
//                    'id' => $user->id,
//                    'name' => $user->name,
//                    'can' => [
//                        'edit' => Auth::user()->can('edit', $user)
//                    ]
//                ]),

            'filters' => request()->only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    }

    public function show(User $user)
    {
        return Inertia::render('Users/Show', [
            'user' => UserResource::make($user)
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        User::create($attributes);

        return redirect('/users');
    }
}
