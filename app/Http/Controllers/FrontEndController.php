<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use App\Booklist;
use App\Gallery;
use App\GalleryPhoto;
use Session;

class FrontEndController extends Controller
{
    //
    //$a = Post::orderBy('created_at', 'desc')->take(3)->get()->first();
    
    public function index()
    {
    	return view('index')
    	->with('title', Setting::first()->site_name)
    	->with('categories', Category::take(3)->get())
    	->with('first_post', Post::orderBy('created_at', 'desc')->first())
    	->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(4)->get())
    	->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
    	->with('corousel_post', Post::all())
        ->with('video1', Category::find(24))
        ->with('news1', Category::find(20))
        ->with('artist1', Category::find(21))
    	->with('news', Category::find(20)->posts()->orderBy('created_at', 'desc')->take(6)->get())
        ->with('video', Category::find(24)->posts()->orderBy('created_at', 'desc')->take(5)->get())
    	->with('artist', Category::find(21)->posts()->orderBy('created_at', 'desc')->take(6)->get())
    	->with('pakets', Category::find(23)->posts()->orderBy('created_at', 'desc')->take(3)->get())
    	->with('settings', Setting::first());
    }

    public function singlePost($slug)
    {

    	$post = Post::where('slug', $slug)->first();
        $recents =  $post->category_id;
        $recents = Category::find($recents)->posts()->orderBy('created_at', 'desc')->take(3)->get(); 

        $next_id = Post::where('id', '>', $post->id )->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');  

    	return view('singles')->with('post', $post)
    	->with('title', $post->title)
    	->with('categories', Category::take(3)->get())
    	->with('settings', Setting::first())
        ->with('next', Post::find($next_id))
        ->with('prev', Post::find($prev_id))
        ->with('tags', Tag::all())
        ->with('recents', $recents);

    }

    public function category($id)
    {

        $category = Category::find($id);
        //dd($category);
        //$category = Category::where('id', '=', $id)->paginate(3);

        return view('category')->with('category', $category)
        ->with('title', $category->name)
        ->with('categories', Category::take(3)->get())
        ->with('settings', Setting::first());

    }

    public function gallery()
    {

        $gallery = Gallery::all();
        //dd($category);
        //$category = Category::where('id', '=', $id)->paginate(3);

        return view('gallery')->with('gallery', $gallery)
        ->with('title', 'Gallery')
        ->with('categories', Category::take(3)->get())
        ->with('settings', Setting::first());

    }

    public function gallerySingle($id)
    {

        $gallery = Gallery::find($id);
        $photos = $gallery->galleryphotos()->get();

        //dd($photos);
        //$category = Category::where('id', '=', $id)->paginate(3);

        return view('singlegallery')->with('gallery', $gallery)
        ->with('photos', $photos)
        ->with('title', 'Gallery ' . $gallery->name)
        ->with('categories', Category::take(3)->get())
        ->with('settings', Setting::first());

    }

    public function tag($id)
    {

        $tag = Tag::find($id);

        return view('tag')->with('tag', $tag)
        ->with('title', $tag->tag)
        ->with('categories', Category::take(3)->get())
        ->with('settings', Setting::first());

    }

    public function caritgl()
    {

        

        return view('caritgl')
        ->with('categories', Category::take(3)->get())
        ->with('settings', Setting::first())
        ->with('title', 'Search Available Date');

    }

    public function cariTglStatus(Request $request)
    {

        $this->validate($request, [

            'book' => 'required|date'
            
            

        ]);

        $result = Booklist::where('date',$request->book )->first();
        $tgl = $request->book;
        

        return view('cartgl2')
        ->with('categories', Category::take(3)->get())
        ->with('settings', Setting::first())
        ->with('title', 'Search Available Date')
        ->with('result', $result)
        ->with('tgl', $tgl);

    }
   

}