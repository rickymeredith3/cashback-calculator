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
        $cards = Card::orderBy('id', 'desc')->get();
        $categories = Reward::distinct('category')->orderBy('category')->pluck('category');
        return view('dashboard/index', ['cards' => $cards, 'categories' => $categories]);
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

    function calculate(Request $request, $category){
        $reward = Reward::where('category', $category)->get();
        $max = $reward->sortByDesc('reward')->first();
        $card = Card::find($max->card_id);

        return response()->json([
            'success' => true,
            'reward' => $max->reward,
            'card' => $card->nickname
        ]);
        
    }
}
