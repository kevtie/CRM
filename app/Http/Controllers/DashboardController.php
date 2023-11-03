<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard(Request $request){
        $cards = Card::where('deadline', '!=', null)->get()->User();
        dd($cards);
        // ->first()->user->pivot->where('user_id', auth()->user()->id)
        return Inertia::render('Dashboard', [
            'deadlines' => $cards->deadline,
            'user' => auth()->user(),
        ]);
    }
}
