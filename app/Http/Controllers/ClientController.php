<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Client;
use App\Models\Business;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function getAllClients(){
        $clients = Client::with('business')->get();
        return Inertia::render('ContactList', [
            'clients' => $clients,
            'businesses' => Business::get(),
        ]);
    }

    public function addClientOrBusiness(Request $request){
        // dd($request->businessRadio);
        $request->validate([
            'varName' => 'required|string',
            'varEmail' => 'Email|nullable',
            'varTel' => 'Integer|nullable',
            'varAddress' => 'required|string',
        ]);
        if($request->clientRadio === 'client'){
            Client::create([
                'name' => $request->varName,
                'email' => $request->varEmail ?? null,
                'tel_number' => $request->varTel ?? null,
                'address' => $request->varAddress,
                'business_id' => $request->businessRadio ?? null,
            ]);
        }elseif($request->clientRadio === 'business'){
            Business::create([
                'name' => $request->varName,
                'email' => $request->varEmail ?? null,
                'tel_number' => $request->varTel ?? null,
                'address' => $request->varAddress,
            ]);
        }else{
            return back()->withErrors('Something went wrong!');
        }
        return back();
    }

    public function sortClients(Request $request){
        $request->validate([
            'sortClientName' => 'required|string',
            'sortType' => 'required|string',
        ]);
        $sortedClientList = Client::with('business')->orderBy($request->sortClientName, $request->sortType)->get();
        $sortedBusinessList = Business::orderBy($request->sortClientName, $request->sortType)->get();
        return Inertia::render('ContactList', [
            'clients' => $sortedClientList,
            'businesses' => $sortedBusinessList,
        ]);
    }
}
