<?php

namespace App\Http\Controllers\Admin;

use App\TeacherCourse;
use App\Teacher;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherCourseController extends Controller
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
        $teachers = Teacher::all();
        $courses = Course::orderBy('id', 'DESC')->get();
        $menu = 'teachercourse';
        return view('admin.teachercourse.index', compact('teachers','courses','menu'));
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
        $teachercourse = new TeacherCourse;
        $teachercourse->teacher_id = $request->teacher_id;
        $teachercourse->course_id = $request->course_id;
        $teachercourse->save();

        return redirect('admin\teachercourse')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeacherCourse  $teacherCourse
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherCourse $teacherCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherCourse  $teacherCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherCourse $teacherCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherCourse  $teacherCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherCourse $teacherCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherCourse  $teacherCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $teachercourse = TeacherCourse::where('teacher_id',$request->teacher_id)->where('course_id',$request->course_id)->first();

        if($teachercourse){
            $teachercourse->delete();
        }
        return redirect('admin\teachercourse')->with('success', 'Information has been Removed');
    }
}
