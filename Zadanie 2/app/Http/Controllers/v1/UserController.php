<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_users = User::all();

        return view('shop', [
            'array' => $all_users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function registration(Request $request)
    {
        $validationOfData = $request->validate(
            [
                'name' => 'required|string|max:20|unique:users,login',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'address' => 'string|max:255',
                'city' => 'string|max:100',
                'postal_code' => 'string|digits:5',
                'phone' => 'string|max:20'
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
                'address.string' => 'Address must be a string',
                'city.string' => 'City must be a string',
                'postal_code.string' => 'Postal code must be a number',
                'phone.string' => 'Phone must be a string'
            ]
        );


        $user = User::create([
            'login' => $validationOfData['name'],
            'email' => $validationOfData['email'],
            'password' => bcrypt($validationOfData['password'])
        ]);

        return response()->json(
            [
                'token' => $user->createToken('eshop')->plainTextToken,
                'message' => 'Registration successful! You are now logged in.'
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}