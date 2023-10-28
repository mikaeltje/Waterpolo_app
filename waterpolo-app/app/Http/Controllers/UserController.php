<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(user $user){
        $matches = Matches::all()->where('user_id', Auth::user()->id);
        return view('user.index', compact('matches'));
    }
    public function show(user $user){
        return view('user.show', compact('user'));
    }
    public function edit(user $user){

        return view('user.edit', compact('user'));
    }
    public function update(user $user){


        $user->update(request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]));
        return redirect()->route('profile', [$user])->with('status','profile updated');
    }
}
