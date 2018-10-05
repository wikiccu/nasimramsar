<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Course;
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
        $courses = Course::all();
        $menu = 'gallery';
        return view('admin.gallery.create',compact('courses','menu'));
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
        $gallery = new Gallery;
        $gallery->title = $request->title;
        $gallery->body = $request->body;
        $gallery->course_id = $request->course_id;

        $gallery->save();

        //$gallery->id

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
