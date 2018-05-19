<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Restaurent;
use App\Review;
use App\New_offer;
use App\Menu;
use App\Comments;
use App\User;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){ 
        
        
        return view('home');
    }

    public function home(){
        $reviews= Review::all();
        $comments= Comments::all();
        return view('index',['reviews'=>$reviews,'comments'=>$comments]);
    }

    public function comment(Request $request){

        $this->validate($request, [
            'review_id' => 'required|numeric',
            'comment' => 'required'
        ]);
        /// Yu may save here the comment and return the comment
        $data=array($request->review_id,$request->comment);
        $reviewid=$request->review_id;
        $comments= new Comments;
        $comments->reviewid=$reviewid;
        $comments->comment=$request->comment;
        $comments->uid=Auth::user()->id;
        $comments->save();
        $comment_id= Comments::where('uid',Auth::user()->id)
                    ->orderBy('id', 'desc')->first()->id;


        return response()->json(['success'=>'successful.' , 'uid'=>Auth::user()->name,'comment_id'=>$comment_id]);
    }



    public function commentDelete($id){
        
        $comments = Comments::find($id);
        $comments->delete();
        return response()->json(['success'=>'removed.' , 'id'=>$id]);
    }





    public function post(Request $request){
        $this->validate($request, [
            'restaurant' => 'required',
            'menu'=> 'required',
            'rating'=>'required',
            'review'=>'required'
        ]);

        $restaurant=$request->input('restaurant');
        $rid= Restaurent::where('name',$restaurant)->first()->id;


        $reviews = new Review;
        $reviews->details = $request->input('review');
        $reviews->menu = $request->input('menu');
        $reviews->rating = $request->input('rating');
        $reviews->uid = Auth::user()->id;
        $reviews->rid = $rid;
        $reviews->save();
        return redirect('/');
    }




    public function restaurants(){
        $restaurants = Restaurent::all();
        return view('restaurent',['restaurants'=>$restaurants]);
    }




    public function addRestaurant(Request $request){
        $this->validate($request, [
            'restaurant' => 'required',
            'menu'=> 'required',
            'type'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'details'=>'required'
        ]);


        $restaurant = new Restaurent;
        $restaurant->name = $request->input('restaurant');
        $restaurant->type = $request->input('type');
        $restaurant->address = $request->input('address');
        $restaurant->contact = $request->input('contact');
        $restaurant->save();

        $forMenuUpdate = Restaurent::orderBy('id','desc')->first()->id;
        $menu = new Menu;
        $menu->rid= $forMenuUpdate;
        $menu->menu= $request->input('menu');
        $menu->rating = "0";
        return redirect('/');
    }








    // ================================ Arnab code ============================ //
    public function ajaxRequest() 
    {
        $users = User::all();
        return view('ajaxRequest' , compact('users'));
    }

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequestPost(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->input( 'password' ));
        $user->email = $request->input( 'email' );
        $user->save();
        return response()->json(['success'=>'Got Simple Ajax Request.' , 'id'=>$user->_id]);
    }
    public function ajaxTestDelete($id){
        $user = User::find($id);
        $user->delete();
        //echo "HI HI HI";
        return response()->json(['success'=>'removed.' , 'id'=>$user->_id]);
    }
}
