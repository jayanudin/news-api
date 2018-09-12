<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post  = Post::all();
        return view('post.post', ['post' => $post]);
    }

    public function allnews()
    {
       
        $post  = Post::all();
        return response()->json($post);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'body' => 'required'
            ]);
            $title  = $request['title'];
            $body = $request['body'];
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = 'uploads/';
            $file = $file->move($path, $fileName);
            
            $post = new Post;
            $post->title = $title;
            $post->image = $file;
            $post->body = $body;
            $post->save();
            return redirect('/')->with('message', 'success create article');
        } catch (Exception $e) {
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
