<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        return view('usermanagement.userM');
    }


    protected function create(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],

            ]
        );

        User::create([
            'name' =>  $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin ? 1 : 0,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.management');
    }
}
