<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::all();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $this->validate($request, [
            'SKU' => 'required',
            'Name' => 'required',
            'Price' => 'required',
            'Type' => 'required',
            'Size' => 'required_if:Type,==,1',
            'Weight' => 'required_if:Type,==,2',
            'Height' => 'required_if:Type,==,3',
            'Width' => 'required_if:Type,==,3',
            'Lenght' => 'required_if:Type,==,3',
        ]);
        //Create Post
        $post->SKU = $request->input('SKU');
        $post->Name = $request->input('Name');
        $post->Price = $request->input('Price');
        $post->Type = $request->input('Type');
        if($post->Type == "1") $post->Attribute = $request->input('Size');
        else if ($post->Type == "2")$post->Attribute = $request->input('Weight');
        else {
            $Size = $request->input('Height')."x".$request->input('Width')."x".$request->input('Lenght');
            $post->Attribute = $Size;
        }
        $post->save();
        return redirect('/posts');
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
        //return dd($id);
        return redirect('/posts');
    }
    public function deleteall(Request $request)
    {
        $delid = $request->input('delid');
        POST::whereIn('id', $delid)->delete();
        return redirect('/posts');
    }
}
