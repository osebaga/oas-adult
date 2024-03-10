<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_user(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);
        }
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
                return view('dashboard.dashboard');
            } else {
                return redirect()->back()->with("error_message", "Invalid Username or Password");
            }
        }

        return view('users.login');
    }

    /**
     * Display the specified resource.
     */
    public function logout()
    {
        Auth::logout();
        return view('users.login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
