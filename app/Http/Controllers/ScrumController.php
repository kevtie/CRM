<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class ScrumController extends Controller
{
    public function getAssignedScrumboards(){
        $currentUser = auth()->user();
        $scrum = $currentUser->Scrumboard;
        // dd($scrum);
        return Inertia::render('Scrumboard', [
            'scrumboards' => $scrum,
        ]);
    }
}
