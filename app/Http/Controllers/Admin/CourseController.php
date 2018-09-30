<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        $menu = 'course';
        return view('admin.course.index', compact('courses','menu'));
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
        return view('admin.course.create',compact('fields','menu'));
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
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');

            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(300, 300);

            $filename = time().'_'.$file->getClientOriginalName();
            $image_resize->save(public_path('images/course/' .$filename));
        }

        $course = new Course;

        $course->pic = $filename;
        $course->title = $request->title;
        $course->abstract = $request->abstract;
        $course->information = $request->information;
        $course->description = $request->description;
        $course->field_id = $request->field_id;

        $course->save();

        return redirect('admin\course')->with('success', 'Information has been added');
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
        return view('admin.course.show',compact('course','id','menu'));
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
        return view('admin.course.edit',compact('course','id','fields','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $course = Course::find($id);
        //$course->title = $request->title;
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
        $course->delete();
        return redirect('admin\course')->with('success', 'Information has been Removed');
    }
}
