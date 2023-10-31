<?php

namespace App\Http\Controllers;

use App\Models\Scrumboard;
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

    public function createScrumboard(Request $request){
        $request->validate([
            'name' => 'required|String',
            'client_id' => 'Integer|nullable',
        ]);
        $scrum = Scrumboard::create([
            'name' => $request->name,
            'client_id' => $request->clientId ?? null,
        ]);
        $scrum->user()->attach(auth()->user());
        return back();
    }
}
