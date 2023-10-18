<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Client;
use App\Models\Business;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getAllClients(){
        $clients = Client::with('business')->get();
        // $clients = Business::with('client')->get();
        // dd($clients);
        return Inertia::render('ContactList', [
            'clients' => $clients,
            'businesses' => Business::get(),
        ]);
    }

    public function addClientOrBusiness(Request $request){
        if(Str::contains($request->varEmail, ['@', '.']) || $request->varEmail === null){
            if($request->clientRadio === 'client'){
                Client::create([
                    'name' => $request->varName,
                    'email' => $request->varEmail ?? null,
                    'tel_number' => $request->varTel ?? null,
                    'address' => $request->varAddress,
                    'business_id' => $request->varBusiness ?? null,
                ]);
            }elseif($request->BusinessRadio === 'business'){
                Business::create([
                    'name' => $request->varName,
                    'email' => $request->varEmail ?? null,
                    'tel_number' => $request->varTel ?? null,
                    'address' => $request->varAddress,
                ]);
            }else{
                return back()->withErrors('Something went wrong!');
            }
        }else{
            return back()->withErrors('Email was not inserted correctly!');
        }
        
        
        return back();
    }

    public function sortClients(Request $request){
        $list = Client::with('business');
        $sortedList = $list->orderBy($request->sortName, $request->sortType)->get();
        Inertia::render('sorted', [
            'list' => $sortedList,
        ]);
    }
}
