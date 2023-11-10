<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Card;
use Inertia\Inertia;
use App\Models\Scrumboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard(){
        $cards = Card::where('deadline', '!=', null);
        $allCardsAmount = $cards->get()->count();
        $cardsPastDeadlineAmount = $cards->where('deadline', '<', Carbon::now())->get()->count();
        $clearPercentage = ($cardsPastDeadlineAmount / $allCardsAmount) * 100;
        // dd(auth()->user()->Card);
        return Inertia::render('Dashboard', [
            'deadlines' => $cards->get()->pluck('deadline'),
            'deadlinesCount' => $cards->count(),
            'cardNames' => $cards->get()->pluck('name'),
            'lateScrumboard' => Scrumboard::find($cards->get()->pluck('id'))->pluck('name'),
            'clearPercentage' => $clearPercentage,
            'user' => auth()->user(),
        ]);
    }
}
