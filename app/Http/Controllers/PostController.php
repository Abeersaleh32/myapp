<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::all();
        //$id = Auth::user()->id;
        //$posts = $id->posts()->get();
        //$postsinfo = Posts::find($postsinfo);
        //dd($posts);
        return View ('blog.viewposts', [$posts=>'posts']);
    }


    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) /* when the form was submitted, we will grab the info by using requst */
    {
        if (Auth::check()) {
        $posts = new Posts;
        $posts->picture = $request->picture;
        $posts->paragraph = $request->paragraph;
        $posts->user_id=Auth::user()->id;
        $posts->save();    }

            return redirect('/welcome')->with('Post Created..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*looking for post by fetch it with find by id*/
        $showpost =Posts:: find('$id');
        return view('blog.show')->with('showpost',$showpost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edite($id)
    {
        $editepost =Posts:: find('$id');
        if(auth()->user()->$id !== $editepost ->user_id)
        { return redirect('/show');
        }
        return view('blog.edite')->with('editepost',$editepost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,['picture'=> 'required' , 'paragraph'=> 'required']);
        $postmodel= Posts::find($id);
        $postmodel->picture= request('picture');
        $postmodel->paragraph= request('paragraph');
        $postmodel->save();
        return redirect('/welcome')->with('Post Updated..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function destroy($id)
    {
        //
    }*/
}
