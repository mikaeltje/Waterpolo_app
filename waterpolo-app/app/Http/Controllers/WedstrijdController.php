<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WedstrijdController extends Controller
{
    public function index(){
        return view('index');
    }
    public function show(){
        $wedstrijd = 'donk - zvl';
        return view('show', compact('wedstrijd') );
    }
}
