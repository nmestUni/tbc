<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use App\posts;
class GuestController extends Controller
{
    public function index()
    {
        $client = new SoapClient('http://nbg.gov.ge/currency.wsdl');
        $posts=posts::orderBy("created_at","desc")->take(2)->get();
        
        return view('home' )->with("client",$client)->with("posts",$posts);
    }

    public function currencies() 
    {
        $client = new SoapClient('http://nbg.gov.ge/currency.wsdl');
    	return view('currency')->with("client",$client);
    }

    public function contact() 
    {
    	return view('contact');
    }

    public function location() 
    {
    	return view('locations');
    }
    public function show($id)
    {
        $posts=posts::where("id",$id)->first();
        return view("posts.show")->with("post",$posts);
    }
    public function posts()
    {
        $posts=posts::paginate(3);
        return view("posts.posts")->with("posts",$posts);
    }
    //baratis motxovnis shemdeg admins misdis dasadastrueblad, dadasutrbes shemtxvevashi gamochdneba momxmarebeltan
}
