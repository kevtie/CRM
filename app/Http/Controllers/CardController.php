<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Card;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Scrumboard;
use App\Models\CardCategory;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function getCards(Request $request){
        $currentUser = auth()->user();
        $scrum = $currentUser->Scrumboard;
        $categories = CardCategory::with(['cards' => function ($query) use ($request){
            $query->where('scrumboard_id', $request->scrumId);
        }])->orderBy('ordering', 'asc')->get();
        foreach(Scrumboard::find($request->scrumId)->user as $board){
            $users[] = $board->pivot->user_id;
        }
        foreach(Card::where('scrumboard_id', $request->scrumId)->get() as $card){
            foreach($card->user as $assignedToCard){
                $assignedToCardUsers[] = $assignedToCard->name;
            }
        }
        // dd($assignedToCardUsers);
        $assignedUsers = User::find($users);
        return Inertia::render('Scrumboard', [
            'categories' => $categories,
            'scrumId' => $request->scrumId,
            'scrumboards' => $scrum,
            'assignedUsers' => $assignedUsers,
        ]);
    }

    public function addCardToBoard(Request $request){
        // dd($request->deadline);
        if($request->deadline !== null && Carbon::createFromFormat('Y-m-d', $request->deadline)->gt(date('Y-m-d')) || $request->deadline === null){
            Card::create([
                'content' => $request->content,
                'deadline' => $request->deadline ?? null,
                'type_id' => $request->typeRadio,
                'scrumboard_id' => $request->scrumId,
                'category_id' => $request->categoryRadio,
            ]);
            return back();
        }else{
            return back()->withErrors('Deadline has to be on or after' . date('Y-m-d'));
        }
    }

    public function addUserToCard(Request $request){
        $currentCard = Card::where('id', $request->cardId)->first()->User();
        $currentCard->sync($request->userId);
        return back();
    }

    public function changeCategory(Request $request){
        
        $currentCard = Card::where('id', $request->cardId)->first();
        
        $type = $request->typeRadio;
        $category = $request->categoryRadio;
        
        if($type === null){
            $type = $currentCard->type_id;
        }
        if($category === null){
            $category = $currentCard->category_id;
        }
        $currentCard->update([
            'category_id' => $category,
            'type_id' => $type
        ]);
        return back();
    }

    public function deleteCard(Request $request){
        Card::where('id', $request->cardId)->delete();
        return back();
    }
}
