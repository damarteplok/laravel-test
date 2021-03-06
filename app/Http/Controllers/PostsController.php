<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Session;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index')->with('posts', Post::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count()==0 || $tags->count() == 0)
        {

            Session::flash('info', 'u must have at least one fucking category or tag');

            return redirect()->back();

        }

        return view('admin.posts.create')->with('categories', $categories)
                                         ->with('tags', $tags);
    }

    public function video()
    {
        //

        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count()==0 || $tags->count() == 0)
        {

            Session::flash('info', 'u must have at least one fucking category or tag');

            return redirect()->back();

        }

        return view('admin.posts.crvideo')->with('categories', $categories)
                                         ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [

            'title' => 'required',
            'featured' => 'required|image|mimes:jpg,jpeg,bmp,png|max:2000',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'

        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([

            'title'=> $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()

        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created succesfully');


        return redirect()->back();
    }

    public function stvideo(Request $request)
    {
       
        $this->validate($request, [

            'title' => 'required',
            'featured' => 'required|image|mimes:jpg,jpeg,bmp,png|max:2000',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'url' => 'required'

        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([

            'title'=> $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id(),
            'youtube_url' => $request->url

        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created succesfully');


        return redirect()->back();
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

        $post = Post::find($id);

    

        return view('admin.posts.edit')->with('post', $post)
        ->with('categories',Category::all())
        ->with('tags', Tag::all());

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
        $this->validate($request, [

            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'

        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {

            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts/', $featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;

        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->youtube_url = $request->url;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);  

        Session::flash('success','success edit guys');

        return redirect()->route('posts');      

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
        $post = Post::find($id);

        $post->delete();

        Session::flash('success','The post was gone, Nope just in trash for a while or forever?');

        return redirect()->back();
    }

    public function trashed(){

       
        $post = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $post);

    }

    public function kill($id)

    {


        $post = Post::withTrashed()->where('id', $id)->first();

        $post->ForceDelete();

        Session::flash('success','its gone forever dude');

        return redirect()->back();

    }

    public function restore($id)

    {


        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success','its back dude');

        return redirect()->route('posts');

    }
}
