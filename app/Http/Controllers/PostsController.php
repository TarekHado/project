<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class PostsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:posts-list|posts-create|posts-edit|posts-delete', ['only' => ['index','show']]);
        $this->middleware('permission:posts-create', ['only' => ['create','store']]);
        $this->middleware('permission:posts-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:posts-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(20);
        return view('Posts.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

        return view('Posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'title'=>'required',
            'content'=>'required',
            'image'=>'nullable',
        ];
        $messages=['title.required'=>'title is required',
            'body.required'=>'body is required',];
        $this->validate($request,$rules,$messages
        );
        $post=new Post;

        if($request->hasFile('image')){
            $image=$request->file('image');
            $name=$image->getClientOriginalName();
            $image_name=time().'.'.$name;

            $request->image->move(public_path('images'),$image_name);
        }
        $post->category_id=$request->input('category_id');
        $post->image=$image_name;
        $post->content=$request->input('content');
        $post->title=$request->input('title');
        $post->save();
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrfail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        return view('Posts.edit',compact('post'));
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
        $rules = [
            'title' =>'required',
            'content'=>'required',
            'image'=>'required'
        ];

        $messages = [
            'title.required' => 'Title of the post is required',
            'content.required' =>'Content of the post is required',
            'image.required' => 'You must add a picture'
        ];
        $this->validate($request,$rules,$messages);
        $post = Post::findOrfail($id);
        $post->update($request->all());
        flash()->success('Edited successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrfail($id);
        $post->delete();
        flash()->success('Deleted');
        return redirect(route('posts.index'));
    }
}
