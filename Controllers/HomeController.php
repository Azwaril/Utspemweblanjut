<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $events = Event::latest()->get();
        $popularEvents = Event::orderBy('views', 'desc')->take(3)->get(); // atau berdasarkan kriteria lain
        return view('home', compact('events', 'popularEvents'));
    }
    
}
