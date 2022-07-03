<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',["post"=>Post::where('user_id',Auth::user()->id )->latest()->paginate(4)]);
    }

    public function detail($id)
    {
        
        return view('detail',["post"=>Post::where('id',$id)->first()]);
    }

    public function delete($id)
    { 
        Post::where('id', '=',$id)->delete();
        
        return redirect()->route('home')->with('status', 'Data Deleted Successfully');
    }
    public function insert($id="")
    {

        if (empty($id)) {

            return view('create');

        }else{
            return view('create',["post"=>Post::where('id',$id)->first()]);
        }
        
    }
    public function doinsert(Request $req)
    {
       $insert = new  Post($req->all());
       if($insert->save()){
        return redirect()->route('home')->with('status', 'Data Added Successfully');
       }else{
        return redirect()->route('home')->with('status', 'Added Data Failed');
       }

    }
}
