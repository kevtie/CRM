<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function scrumboard(){
        return Inertia::render('Scrumboard', [
            'scrumboards' => auth()->user()->Scrumboard,
        ]);
    }
}
