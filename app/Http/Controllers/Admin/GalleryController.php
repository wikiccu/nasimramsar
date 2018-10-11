<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Course;
use App\Image;
use App\FroalaFileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as ImageManager;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('active');
        $this->middleware('role:admin');
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
        $filename='';

        if ($request->hasFile('pic')) {
            $file = $request->file('pic');

            $image_resize = ImageManager::make($file->getRealPath());
            $image_resize->resize(500, 400);

            $filename = 'images/galleries/g_p_'.time().'_'.$file->getClientOriginalName();
            $image_resize->save(public_path($filename));
         }

        $gallery = new Gallery;
        $gallery->pic = $filename;
        $gallery->title = $request->title;
        $gallery->body = $request->body;
        $gallery->course_id = $request->course_id;

        $gallery->save();

        //return $gallery->id;
        //save gallery image
        if($request->hasFile('uploadPics')){
            $index = 1;
            foreach($request->file('uploadPics') as $file){
                $name='g_'.$gallery->id.'_'.time().'_'.$file->getClientOriginalName();
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

        if ($request->hasFile('pic')) {

            $file = $request->file('pic');
            $image_resize = ImageManager::make($file->getRealPath());
            $image_resize->resize(500, 400);

            if($gallery->pic==''){
                $filename = 'images/galleries/g_p_'.time().'_'.$file->getClientOriginalName();
                $image_resize->save(public_path($filename));
                $gallery->pic = $filename;
            }else{
                $filename = $gallery->pic;
                $image_resize->save(public_path($filename));
            }
        }

        $gallery->title = $request->title;
        $gallery->body = $request->body;
        $gallery->course_id = $request->course_id;
        $gallery->save();

        if($request->hasFile('uploadPics')){
            $index=$gallery->images->count()+1;
            foreach($request->file('uploadPics') as $file){
                $name='g_'.$gallery->id.'_'.time().'_'.$file->getClientOriginalName();
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

        $filename = $gallery->pic;
        if(file_exists(public_path($filename)))
        {
            unlink(public_path($filename));
        }

        //remove pic from body
        $this->deleteImage($gallery->body);

        //remove images
        foreach ($gallery->images as $image) {
            if(file_exists(public_path($image->pic)))
            {
                unlink(public_path($image->pic));
            }
            $image->delete();
        }

        $gallery->delete();
        return redirect('admin\gallery')->with('success', 'Information has been Removed');
    }

    public function destroyImage(Request $request)
    {
        //remove image
        $img = Image::find($request->id);
        $filename = $img->pic;
        if(file_exists(public_path($filename)))
        {
            unlink(public_path($filename));
        }
        $img->delete();

        return redirect('admin\gallery\\'.$request->gallery_id.'\edit');
    }

    public function changeImageTitle(Request $request)
    {
        //$id = $request->id;
        //$title = $request->title;
        $img = Image::find($request->id);
        $img->title = $request->title;
        $img->save();

        return 'ok';
    }

    public function deleteImage($text)
    {
        $pattern = "<img.*?>";
        $parts = preg_split($pattern, $text);

        // Loop through parts array and display substrings
        foreach($parts as $part){
            $startpos=stripos($part,"src=");
            $endpos=stripos($part,"\" ",$startpos);
            if($startpos!=false && $endpos!=false)
            {
                $src = substr($part,$startpos+5,$endpos-$startpos-5);
                //unlink($src);
                $splitPath = explode("/", $src);
                $splitPathLength = count($splitPath);
                $filename=$splitPath[$splitPathLength-1];
                if(file_exists(public_path('images/froalafiles/'.$filename)))
                {
                    unlink(public_path('images/froalafiles/'.$filename));
                }
                FroalaFileUpload::where('path', 'LIKE', '%' . $filename . '%')->delete();
            }
        }
    }

}
