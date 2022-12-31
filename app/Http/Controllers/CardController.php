<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Reward;
use Illuminate\Support\Facades\Validator;

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
            'bank' => 'required',
            'category' => 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'success'=> false, 
                'errors' => $validator->errors(),
            ]);
        }

        $card = Card::create([
            'nickname' => $request['nickname'],
            'bank' => $request['bank']
        ]);

        for ($i=0; $i < sizeof($request['rewards']); $i++) { 
            
            Reward::create([
                'card_id' => $card->id,
                'category' => $request['category'][$i],
                'reward' => $request['rewards'][$i]
            ]);
        }

        return response()->json(['success' => true]);
    }
}
