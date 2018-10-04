<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('active');
        //$this->middleware('role:editor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gallerys = Gallery::orderBy('id', 'DESC')->get();
        $menu = 'gallery';
        return view('admin.gallery.index', compact('gallerys','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects = Subject::all();
        $menu = 'gallery';
        return view('admin.gallery.create',compact('subjects','menu'));
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
        $filename='';

        if ($request->hasFile('pic')) {
            $file = $request->file('pic');

            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(400, 270);

            $filename = 'images/gallerys/'.time().'_'.$file->getClientOriginalName();
            $image_resize->save(public_path($filename));
        }

        $gallery = new Gallery;

        $gallery->pic = $filename;
        $gallery->title = $request->title;
        $gallery->abstract = $request->abstract;
        $gallery->body = $request->body;
        $gallery->subject_id = $request->subject_id;

        $gallery->user_id=1;

        if (Auth::check()) {
            // The user is logged in...
            $gallery->user_id = Auth::id();
        }

        $gallery->save();

        return redirect('admin\gallery')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
        $gallery = Gallery::find($id);
        $menu = 'gallery';
        return view('admin.gallery.show',compact('gallery','id','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
        $gallery = Gallery::find($id);
        $subjects = Subject::all();
        $menu = 'gallery';
        return view('admin.gallery.edit',compact('gallery','id','subjects','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
        $gallery = Gallery::find($id);
        $subjects = Subject::all();
        $menu = 'gallery';
        return view('admin.gallery.edit',compact('gallery','id','subjects','menu'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
        $gallery = Gallery::find($id);
        //removed file
        $filename = $gallery->pic;
        unlink(public_path($filename));

        //remove pic from body
        // $this->deleteImage($gallery->information);
        // $this->deleteImage($gallery->description);

        $gallery->delete();
        return redirect('admin\gallery')->with('success', 'Information has been Removed');
    }
}
