<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Card;
use App\Types\CardCategories;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard(){
        $cards = Card::where('deadline', '!=', null);
        $allCardsAmount = $cards->get()->count();
        $cardsPastDeadlineAmount = $cards->where('deadline', '<', Carbon::now())->where('category_id', '!=', CardCategories::Done)->get()->count();
        $clearPercentage = (($allCardsAmount - $cardsPastDeadlineAmount) / $allCardsAmount) * 100;
        $lateScrumboard = $cards->where('deadline', '<', Carbon::now())->with('scrumboard:id,name')->get()->pluck('scrumboard')->unique();
        return Inertia::render('Dashboard', [
            'deadlines' => $cards->get()->pluck('deadline'),
            'deadlinesCount' => $cards->count(),
            'cardNames' => $cards->get()->pluck('name'),
            'lateScrumboard' => $lateScrumboard,
            'clearPercentage' => $clearPercentage,
            'user' => auth()->user(),
        ]);
    }
}
