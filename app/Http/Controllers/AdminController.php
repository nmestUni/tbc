<?php

namespace App\Http\Controllers;
use App\posts;
use App\User;
use App\cards;

use Auth;
use DB;
use App\card_requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckUser'); 
        $this->middleware('CheckBlocked'); 
   	}
	public function posts()
	{
		$posts=posts::get();
		return view("admin.posts")->with("posts",$posts);


	}
    public function create()
    {
    	return view("posts.create");
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
            "title"=>"required",
            "mdescript" => "required",
            "descript" => "required",
            "file" =>"required|image|mimes:jpeg,png,jpg,gif,svg",
        ]);
        $post=new posts;
        
        $file=Input::file("file");
        $num=mt_rand(1111111,9999999);
        $img=$request->input('title').time().".jpg";
        Input::file('file')->move(public_path()."\img",$img);


        $post->img=$img;
        $post->title=$request->input("title");
        $post->content=$request->input("mdescript");
        $post->miniContent=$request->input("descript");
        
        $post->save();
        return redirect()->route("post"); 
    }

    public function update(Request $request)
    {
    	$this->validate($request,[
            "title"=>"required",
            "mdescript" => "required",
            "descript" => "required",
            
        ]);
        $post=posts::where("id",$request->input("id"))->first();
        var_dump($post);
        if(Input::hasFile("file")){
        	$this->validate($request,[
            
            	"file" =>"image|mimes:jpeg,png,jpg,gif,svg",
        	]);
	        $file=Input::file("file");
	        $num=mt_rand(1111111,9999999);
	        $img=$request->input('title').time().".jpg";
	        Input::file('file')->move(public_path()."\img",$img);


	        $post->img=$img;

        }
        $post->title=$request->input("title");
        $post->content=$request->input("mdescript");
        $post->miniContent=$request->input("descript");
        
        $post->save();
        return redirect()->route("adminposts"); 
    }

    public function edit($id)
    {
    	$post=posts::where("id",$id)->first();
    	return view("posts.edit")->with("post",$post);

    }
    public function delete(Request $request)
    {
    	posts::where("id",$request->input("id"))->delete();
    	return redirect()->route("adminposts"); 

    }
    public function users()
    {
    	$users=User::get();
		return view("admin.users")->with("users",$users);

    }
    public function blockuser(Request $request)
    {
    	if (Auth::user()->id!=$request->input("id")) {
    		# code...
	    	$users=User::where("id",$request->input("id"))->first();
	    	$users->status=0;
	    	$users->save();
			return redirect()->route("adminusers");
    	}
    	return "საკუთარი თავის დაბლოკვა შეუძლებელი";

    }
    public function unblockuser(Request $request)
    {
    	
    	$users=User::where("id",$request->input("id"))->first();
    	$users->status=1;
    	$users->save();
		return redirect()->route("adminusers");
    	

    }
    public function cardrequests()
    {
    	$db=DB::table('card_requests')->leftJoin('users',"users.id","=","card_requests.user_id")->get();
    	
		return view("admin.reqcards")->with("cards",$db);
    }
    public function acceptcard(Request $request)
    {
    	$tr=true;
    	while ($tr){
    		$cardnum="";
	    	while(strlen($cardnum)<16){
	    		$cardnum.=rand(0,9);
	    	}
	    	if ( count( cards::where("cardNumber",$cardnum)->get() ) ==0 ) {
	    		$tr=false;
	    	}
		}
    	$tr=true;
    	while ($tr){
			$accnum="";
	    	while(strlen($accnum)<16){
	    		$accnum.=rand(0,9);
	    	}
	    	if ( count( cards::where("accNum","GEO00TB".$accnum)->get() ) ==0 ) {
	    		$tr=false;
	    	}
		}

    	
    	$user_id=$request->input("id");

    	$reqcard=card_requests::where("user_id",$user_id)->first();

    	$hname=user::where("id",$user_id)->first();
    	
    	$cards= new cards;
    	$cards->userId=$user_id;

    	$cards->accNum="GEO00TB".$accnum;
    	$cards->cardNumber=$cardnum;
    	$cards->date=rand(0,12)."/".rand(0,28);
    	$cards->cve=rand(100,999);
    	$cards->holderName=$hname->name. " ". $hname->surname;
    	$cards->balance="0";
    	$cards->save();
    	card_requests::where("id",$reqcard->id)->first()->delete();
    	return redirect()->route("cardrequests");
    }
    public function rejectcard(Request $request)
    {
    	$id=$request->input("id")  ;
    	card_requests::where("user_id",$id)->first()->delete();
    	return redirect()->route("cardrequests");


    }

    public function cards()
    {	
    	$cards=cards::get()	;
    	
		return view("admin.cards")->with("cards",$cards);


    }
    public function cardsblock(Request $request)
    {	
    	$card_id=$request->input("id");

    	$cards=cards::where("id",$card_id)->first()	;
    	$cards->is_active="0";

		$cards->save();    	
		return redirect()->route("admincards");


    }
    public function cardsunblock(Request $request)
    {	
    	$card_id=$request->input("id");

    	$cards=cards::where("id",$card_id)->first()	;
    	
    	$cards->is_active="1";

		$cards->save();    	
		return redirect()->route("admincards");


    }
}
