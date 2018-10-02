<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use App\Field;
use App\FroalaFileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
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
        $teachers = Teacher::all();
        $menu = 'teacher';
        return view('admin.teacher.index', compact('teachers','menu'));
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
        $menu = 'teacher';
        return view('admin.teacher.create',compact('teacher','fields','menu'));
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

            $filename = 'images/teachers/'.time().'_'.$file->getClientOriginalName();
            $image_resize->save(public_path($filename));
        }

        $teacher = new Teacher;

        $teacher->pic = $filename;
        $teacher->name = $request->name;
        $teacher->title = $request->title;
        $teacher->abstract = $request->abstract;
        $teacher->description = $request->description;
        $teacher->field_id = $request->field_id;

        $teacher->save();

        return redirect('admin\teacher')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $teacher = Teacher::find($id);
        $menu = 'teacher';
        return view('admin.teacher.show',compact('teacher','id','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $teacher = Teacher::find($id);
        $fields = Field::all();
        $menu = 'teacher';
        return view('admin.teacher.edit',compact('teacher','id','fields','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $teacher = Teacher::find($id);

        if ($request->hasFile('pic')) {

            $file = $request->file('pic');
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(400, 270);

            if($teacher->pic==''){
                $filename = 'images/teachers/'.time().'_'.$file->getClientOriginalName();
                $image_resize->save(public_path($filename));
                $teacher->pic = $filename;
            }else{
                $filename = $teacher->pic;
                $image_resize->save(public_path($filename));
            }
        }

        $teacher->name = $request->name;
        $teacher->title = $request->title;
        $teacher->abstract = $request->abstract;
        $teacher->description = $request->description;
        $teacher->field_id = $request->field_id;

        $teacher->save();

        return redirect('admin\teacher')->with('success', 'Information has been modified');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $teacher = Teacher::find($id);
        //removed file
        $filename = $teacher->pic;
        if($filename!='' && file_exists(public_path($filename)))
        {
            unlink(public_path($filename));
        }
        //remove pic from body
        //file_exists("test.txt");
        $this->deleteImage($teacher->information);
        $this->deleteImage($teacher->description);

        $teacher->delete();
        return redirect('admin\teacher')->with('success', 'Information has been Removed');
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
                unlink(public_path('images/froalafiles/'.$filename));
                FroalaFileUpload::where('path', 'LIKE', '%' . $filename . '%')->delete();
            }
        }
    }
}
