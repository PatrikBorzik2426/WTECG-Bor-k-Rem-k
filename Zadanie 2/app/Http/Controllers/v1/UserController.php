<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redirect;

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
                'login' => 'required|max:64|unique:users,login',
                'email' => 'required|email|max:254|unique:users,email',
                'password' => 'required|min:8|regex:/[!@#$%^&*()\-+=\[\]{};:",.<>\/?]/',
                'address' => 'max:255',
                'city' => 'max:100',
                'postal_code' => 'nullable|digits:5',
                'phone' => 'max:20',
                'first_name' => 'max:35',
                'last_name' => 'max:35'
            ],
            [
                'login.required' => 'Prihlásenie je povinné',
                'email.required' => 'E-mail je povinný',
                'password.required' => 'Heslo je povinné',
                'password.regex' => 'Heslo musí obsahovať aspoň jeden špeciálny znak',
                'password.min' => 'Heslo musí mať aspoň 8 znakov',
            ]
        );

        if (isset($validationOfData['phone'])) {
            $validationOfData['phone'] = str_replace(' ', '', $validationOfData['phone']); //Odstrazenie medzier v tele
        }

        $user = User::create([
            'login' => $validationOfData['login'],
            'email' => $validationOfData['email'],
            'password' => Hash::make($validationOfData['password']),
            'address' => $validationOfData['address'] ?? null,
            'postal_code' => $validationOfData['postal_code'] ?? null,
            'city' => $validationOfData['city'] ?? null,
            'phone' => $validationOfData['phone'] ?? null,
            'first_name' => $validationOfData['first_name'] ?? null,
            'last_name' => $validationOfData['last_name'] ?? null
        ]);

        return view('login', [
            'message' => 'Registrácia prebehla úspešne'
        ]);
    }

    public function login(Request $request)
    {
        $validationOfData = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ], [
            'login.required' => 'Prihlásenie je povinné',
            'password.required' => 'Heslo je povinné'
        ]);

        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return Redirect::to('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Redirect::to('/');
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