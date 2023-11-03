<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDeadlines(Request $request){
        Card::where('scrum_id', $request->scrumId)->pluck('deadline');
    }
}
