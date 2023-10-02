<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index(){
        $matches = Matches::all();
        return view('index', compact('matches'));
    }
    public function show(){
        $wedstrijd = 'donk - zvl';
        return view('show', compact('wedstrijd') );
    }
    public function create(){

        return view('create');
    }
}
