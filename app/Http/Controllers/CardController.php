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

}
