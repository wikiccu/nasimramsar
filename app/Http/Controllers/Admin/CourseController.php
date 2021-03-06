<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Field;
use App\FroalaFileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
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
        // $courses = Course::all();
        $courses = Course::orderBy('id', 'DESC')->get();
        $menu = 'course';
        return view('admin.course.index', compact('courses', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fields = Field::all();
        $menu = 'course';
        return view('admin.course.create', compact('fields', 'menu'));
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
        $filename = '';

        if ($request->hasFile('pic')) {
            $file = $request->file('pic');

            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(400, 270);

            $filename = 'images/courses/' . time() . '_' . $file->getClientOriginalName();
            $path = str_replace("index/public/images", "images", public_path($filename));
            $image_resize->save($path);
        }

        $course = new Course;

        $course->pic = $filename;
        $course->title = $request->title;
        $course->abstract = $request->abstract;
        $course->information = $request->information;
        $course->description = $request->description;
        $course->field_id = $request->field_id;

        // if (Auth::check()) {
        //     // The user is logged in...
        //     $course->user_id = Auth::id();
        // }

        $course->save();

        return redirect('admin\expo')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $course = Course::find($id);
        $menu = 'course';
        return view('admin.course.show', compact('course', 'id', 'menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $course = Course::find($id);
        $fields = Field::all();
        $menu = 'course';
        return view('admin.course.edit', compact('course', 'id', 'fields', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $course = Course::find($id);

        if ($request->hasFile('pic')) {

            $file = $request->file('pic');
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(400, 270);

            if ($course->pic == '') {
                $filename = 'images/courses/' . time() . '_' . $file->getClientOriginalName();
                $path = str_replace("index/public/images", "images", public_path($filename));
                $image_resize->save($path);
                $course->pic = $filename;
            } else {
                $filename = $course->pic;
                $path = str_replace("index/public/images", "images", public_path($filename));
                $image_resize->save($path);
            }
        }

        $course->title = $request->title;
        $course->abstract = $request->abstract;
        $course->information = $request->information;
        $course->description = $request->description;
        $course->field_id = $request->field_id;

        $course->save();

        return redirect('admin\course')->with('success', 'Information has been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $course = Course::find($id);
        //removed file
        $filename = $course->pic;
        if (file_exists(public_path($filename))) {
            unlink(public_path($filename));
        }
        //remove pic from body
        //file_exists("test.txt");
        $this->deleteImage($course->information);
        $this->deleteImage($course->description);

        $course->delete();
        return redirect('admin\course')->with('success', 'Information has been Removed');
    }

    public function deleteImage($text)
    {
        $pattern = "<img.*?>";
        $parts = preg_split($pattern, $text);

        // Loop through parts array and display substrings
        foreach ($parts as $part) {
            $startpos = stripos($part, "src=");
            $endpos = stripos($part, "\" ", $startpos);
            if ($startpos != false && $endpos != false) {
                $src = substr($part, $startpos + 5, $endpos - $startpos - 5);
                //unlink($src);
                $splitPath = explode("/", $src);
                $splitPathLength = count($splitPath);
                $filename = $splitPath[$splitPathLength - 1];
                if (file_exists(public_path('images/froalafiles/' . $filename))) {
                    unlink(public_path('images/froalafiles/' . $filename));
                }
                FroalaFileUpload::where('path', 'LIKE', '%' . $filename . '%')->delete();
            }
        }
    }
}
