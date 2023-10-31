<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Client;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function scrumboard(){
        return Inertia::render('Scrumboard', [
            'scrumboards' => auth()->user()->Scrumboard,
            'currentUser' => auth()->user()->role_id,
            'clients' => Client::get(),
        ]);
    }
}
