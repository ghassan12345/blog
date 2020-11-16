<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        $post= Post::all();
        return view("home")->with("posts",$post);
    }

    public function create()
    {
        //\
        echo "hi";
        // return view("createpost");
    }

}
