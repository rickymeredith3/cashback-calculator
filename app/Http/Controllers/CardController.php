<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Reward;

class CardController extends Controller
{
    function dash()
    {
        $cards = Card::all();
        return view('dashboard/index', ['cards' => $cards]);
    }

    function storeCard(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nickname' => 'required',
            'bank' => 'required'
        ]);

        for ($i=0; $i < sizeof($request['rewards']); $i++) { 
            echo $request['rewards'][$i];
            echo $request['category'][$i];
        }
    }
}
