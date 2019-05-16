<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\card_requests;
use App\cards;
class UserhomeController extends Controller
{

public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckBlocked'); 
        $this->middleware('CheckAdmin'); 

   	}

    public function index()
    {   
        $card=count(card_requests::where("user_id",Auth::user()->id)->get());
        $cards=cards::where("userId",Auth::user()->id)->get();
    	return view("ibank.products")->with("cards",$card)->with("available_cards",$cards);
    }

    public function transfer() {
    	return view('ibank.transfers');
    }

    public function card() {
    	return view('ibank.card');
    }
    public function requestcard()
    {
        if(count(card_requests::where("user_id",Auth::user()->id)->get())==0){
            $card= new card_requests;
            $card->user_id=Auth::user()->id;
            $card->save();
        }
        return redirect()->route("userhome");
    }
}
