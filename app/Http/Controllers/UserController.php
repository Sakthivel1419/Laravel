<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        if(Auth::user()->role == 2) {
            abort(401);
        }
        $user = User::all();
        return view('Users.user',['user' => $user]);

    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 2
        ]);
        $user->save();

        return redirect('/users');
    }

    public function edit(Request $request) {
        $data['users'] = User::where('id',$request->id)->first();
        return $data;
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
    }

    public function restore($id) {
        $user = User::withTrashed()->find($id);
        $user->restore();

        return redirect('/users');
    }
}
