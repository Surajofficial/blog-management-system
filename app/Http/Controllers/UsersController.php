<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view("login");
    }
    public function register()
    {
        return view("register");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        // dd($request->all());
        $validate = $request->validate([
            "name" => 'string|required|min:4',
            "email" => 'string|required|unique:users,email',
            "password" => 'string|required|min:6|confirmed',
        ]);
        $data = $request->all();
        $create = User::create($data);
        if ($create) {
            return redirect()->route('login')->with('success', 'User registerd Successfully');
        }
        return redirect()->back()->with('success', 'Somthing Went wrong');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function loginsubmit(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return redirect()->route('index')->with('success', 'test');
        }
        return redirect()->route('login')->with('success', 'test');

    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'test');

    }
    public function index(Request $request)
    {

        return view('home');

    }
}
