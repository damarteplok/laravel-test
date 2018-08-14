<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\GalleryPhoto;
use Session;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function uploadForm(){
        return view('admin.gallery.upload_form');
    }
    public function uploadSubmit(Request $request)
    {
        $product = Gallery::create([
            'name' => $request->title
        ]);
        foreach ($request->photos as $photo) {
            
            $photo_new_name = time().$photo->getClientOriginalName();

            $photo->move('uploads/gallery', $photo_new_name);

            
            GalleryPhoto::create([
                'gallery_id' => $product->id,
                'filename' => 'uploads/gallery/' . $photo_new_name,
            ]);
        }
        
        Session::flash('success', 'U succesfuly add gallery');

        return redirect()->route('gallery.index2');
    }
    public function uploadSubmit2(Request $request)
    {
        // /dd($request->id);
        
        $photo = $request->filename;

            $photo_new_name = time().$photo->getClientOriginalName();

            $photo->move('uploads/gallery', $photo_new_name);

            
            GalleryPhoto::create([
                'gallery_id' => $request->gallery_id,
                'filename' => 'uploads/gallery/' . $photo_new_name,
            ]);

        Session::flash('success', 'U succesfuly add photo');
        
        return redirect()->route('gallery.index2');
    }

    public function index()
    {
        //
        return view('admin.gallery.index')->with('gallery', Gallery::paginate(5));
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
        //
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
        $g = Gallery::find($id);
        $a = $g->galleryPhotos;

        //dd($g);

        return view('admin.gallery.viewedit')->with('gallery', $a)->with('a', $g);
    }

    public function edit2($id)
    {
        //
        $g = GalleryPhoto::find($id);
        

        return view('admin.gallery.edit')->with('gallery', $g);
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

            'featured' => 'required|image|mimes:jpg,jpeg,bmp,png|max:2000'

        ]);

        $g = GalleryPhoto::find($id);

        if($request->hasFile('featured'))
        {

            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/gallery/', $featured_new_name);

            $g->filename = 'uploads/gallery/'.$featured_new_name;

        }
        $g->save();

        Session::flash('success','success edit photo');

        return redirect()->route('gallery.index2');

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
        $g = Gallery::find($id);

        foreach ($g->galleryPhotos as $a) {
            $a->forceDelete();

        }

        $g->delete();

        Session::flash('success', 'U succesfuly delete gallery');

        return redirect()->route('gallery.index2');
    }

    public function destroy2($id)
    {
        //
        $g = GalleryPhoto::find($id);

        

        $g->delete();

        Session::flash('success', 'U succesfuly delete photo');

        return redirect()->route('gallery.index2');
    }

    public function add($id)
    {

        return view('admin.gallery.photo')->with('id', $id);
    }


}
