<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use cards;

class UserCardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckBlocked'); 
        $this->middleware('CheckAdmin'); 

   	}

    public function index(Request $request) {
    	return view('userhome.card');
    }


}
