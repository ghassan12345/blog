<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){

            $post = Post::where('user_id', Auth::user()->id)->get();
            return view('mypost', ['posts'=>$post]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


         return view('createpost');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // $this->validate(
        //     $request,[
        //         "title"=>"required",
        //         "picture"=>"required |image |max:5000",
        //         "text"=>"required",

        //     ]
        // );

        // $origifile=$request->file("picture")->getClientOriginalName();
        // $filename=pathinfo($origifile,PATHINFO_FILENAME);
        // $fileext=$request->file("picture")->getClientOriginalExtension();
        // $renamefile=$filename."-".time().".".$fileext;
        // $path=$request->file("picture")->storeAs("public/images",$renamefile);


        // $post=new Post();
        // $post->title=$request->input("title");
        // $post->text=$request->input("text");
        // $post->picture=$renamefile;
        // $post->user_id=Auth::user()->id;
        // $post->save();

        if(Auth::check()){
            $id=Auth::user()->id;
            $post=Post::create([
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'user_id' => $id,
            ]);
        }
        if($post){
        return \redirect("/home");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $currentPost = Post::find($id);
        $comment = comment::where('posts_id', $id)->get();

        return view("show")->with("current",$currentPost)->with("currentCom",$comment);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $post=Post::find($id);

        return view("edit",compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post=Post::find($id);
        $post->title=request("title");
        $post->text=request("text");
        $post->save();

        return redirect('/show'.$post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect("/posts");
    }
}
