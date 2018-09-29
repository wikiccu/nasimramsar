<?php

namespace App\Http\Controllers\Admin;

use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = Subject::all();
        $menu = 'subject';
        return view('admin.subject.index', compact('subjects','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menu = 'subject';
        return view('admin.subject.create',compact('menu'));
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
        $subject = new Subject;
        $subject->title = $request->title;
        $subject->save();

        return redirect('admin\subject')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
        $subject = Subject::find($id);
        $menu = 'subject';
        return view('admin.subject.show',compact('subject','id','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
        $subject = Subject::find($id);
        $menu = 'subject';
        return view('admin.subject.edit',compact('subject','id','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
        $subject = Subject::find($id);
        $subject->title = $request->title;
        $subject->save();

        return redirect('admin\subject')->with('success', 'Information has been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        $subject = Subject::find($id);
        if($subject->posts->count() ==0){
            $subject->delete();
            return redirect('admin\subject')->with('success','Information has been  deleted');
        }
        return redirect('admin\subject')->with('failed','can not remove Information');
    }
}
