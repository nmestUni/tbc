<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cards;
use App\transactionhistory;
use Auth;

class TransfersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckBlocked'); 
        $this->middleware('CheckAdmin'); 

   	}

   	public function index() {
   		$cards = cards::where('userId', Auth::user()->id)->get();
   		return view('ibank.transfers', compact('cards'));

   	}
   	public function send(Request $request)
   	{
   		$id=$request->input("id");
   		$accnum=$request->input("who");
   		$amount=$request->input("amount");
   		if(cards::where("id",$id)->first()->balance>=$amount){
   			$who=cards::where("accNum",$accnum)->first();
   			$who->balance+=$amount;
   			$who->save();
   			$sender=cards::where("id",$id)->first();
   			$sender->balance-=$amount;
   			$sender->save();
   			$transaction = new transactionhistory;
   			$transaction->senderId = Auth::user()->id;
   			$transaction->amount = $amount;
   			$transaction->receiverId = $accnum;
   			$transaction->save();

   		}
   		return redirect()->route("transfers");
   	}
}
