<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Course;
use App\Image;
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

        //return $gallery->id;
        //save gallery image
        if($request->hasFile('uploadPics')){
            $index = 1;
            foreach($request->file('uploadPics') as $file){
                $name='g_'.$gallery->id.'_'.$file->getClientOriginalName();
                $file->move(public_path().'/images/galleries/', $name);
                $image = new Image;
                if($index==1) {
                    $image->mainPic=1;
                }
                $image->title = $gallery->title.' - عکس '.$index;
                $image->pic ='images/galleries/'.$name;
                $image->gallery_id = $gallery->id;
                $image->save();
                $index++;
            }
        }

        return redirect('admin\gallery')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function edit($id)
    {
        //
        $gallery = Gallery::find($id);
        $courses = Course::all();
        $menu = 'gallery';
        return view('admin.gallery.edit',compact('gallery','id','courses','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $gallery = Gallery::find($id);

        $gallery->title = $request->title;
        $gallery->body = $request->body;
        $gallery->course_id = $request->course_id;
        $gallery->save();

        if($request->hasFile('uploadPics')){
            $index=$gallery->images->count()+1;
            foreach($request->file('uploadPics') as $file){
                $name='g_'.$gallery->id.'_'.$file->getClientOriginalName();
                $file->move(public_path().'/images/galleries/', $name);
                $image = new Image;
                $image->title = $gallery->title.' - عکس '.$index;
                $image->pic ='images/galleries/'.$name;
                $image->gallery_id = $gallery->id;
                $image->save();
                $index++;
            }
        }

        return redirect('admin\gallery')->with('success', 'Information has been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $gallery = Gallery::find($id);
        //removed file
        $filename = $gallery->pic;
        unlink(public_path($filename));

        //remove pic from body
        // $this->deleteImage($gallery->information);
        // $this->deleteImage($gallery->description);

        //remove images
        // $gallery->images

        $gallery->delete();
        return redirect('admin\gallery')->with('success', 'Information has been Removed');
    }

    public function destroyImage(Request $request)
    {
        //remove image
        $img = Image::find($request->id);
        $filename = $img->pic;
        unlink(public_path($filename));
        $img->delete();

        return redirect('admin\gallery\\'.$request->gallery_id.'\edit');
    }

}
