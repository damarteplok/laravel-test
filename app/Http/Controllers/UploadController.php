<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Gallery;
use App\GalleryPhoto;

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
    public function uploadSubmit(UploadRequest $request)
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
        return redirect()->route('home');
    }

    public function index()
    {
        //
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
