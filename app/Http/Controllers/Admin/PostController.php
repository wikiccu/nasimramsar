<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
        //$posts = Post::all();
        $posts = Post::orderBy('id', 'DESC')->get();
        $menu = 'post';
        return view('admin.post.index', compact('posts','menu'));
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
        $menu = 'post';
        return view('admin.post.create',compact('subjects','menu'));
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

            $filename = 'images/posts/'.time().'_'.$file->getClientOriginalName();
            $image_resize->save(public_path($filename));
        }

        $post = new Post;

        $post->pic = $filename;
        $post->title = $request->title;
        $post->abstract = $request->abstract;
        $post->body = $request->body;
        $post->subject_id = $request->subject_id;

        $post->user_id=1;

        if (Auth::check()) {
            // The user is logged in...
            $post->user_id = Auth::id();
        }

        $post->save();

        return redirect('admin\post')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        $menu = 'post';
        return view('admin.post.show',compact('post','id','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $subjects = Subject::all();
        $menu = 'post';
        return view('admin.post.edit',compact('post','id','subjects','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::find($id);

        if ($request->hasFile('pic')) {

            $file = $request->file('pic');
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(400, 270);

            if($post->pic==''){
                $filename = 'images/posts/'.time().'_'.$file->getClientOriginalName();
                $image_resize->save(public_path($filename));
                $post->pic = $filename;
            }else{
                $filename = $post->pic;
                $image_resize->save(public_path($filename));
            }
        }

        $post->title = $request->title;
        $post->abstract = $request->abstract;
        $post->body = $request->body;
        $post->subject_id = $request->subject_id;

        $post->save();

        return redirect('admin\post')->with('success', 'Information has been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        //removed file
        $filename = $post->pic;
        if(file_exists(public_path($filename)))
        {
            unlink(public_path($filename));
        }
        //remove pic from body
        //file_exists("test.txt");
        $this->deleteImage($post->information);
        $this->deleteImage($post->description);

        $post->delete();
        return redirect('admin\post')->with('success', 'Information has been Removed');
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
