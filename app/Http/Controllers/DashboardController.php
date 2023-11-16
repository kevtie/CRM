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
        $clearPercentage = 100 - (($cardsPastDeadlineAmount / $allCardsAmount) * 100);
        $lateScrumboard = Scrumboard::find($cards->where('deadline', '<', Carbon::now())->pluck('scrumboard_id'))->pluck('name');
        // dd($cardsPastDeadlineAmount);
        return Inertia::render('Dashboard', [
            'deadlines' => $cards->get()->pluck('deadline'),
            'deadlinesCount' => $cards->count(),
            'cardNames' => $cards->get()->pluck('name'),
            'lateScrumboardsName' => $lateScrumboard,
            'clearPercentage' => $clearPercentage,
            'user' => auth()->user(),
        ]);
    }
}
