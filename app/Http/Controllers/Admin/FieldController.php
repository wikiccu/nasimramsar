<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$fields = DB::table('fields')->get();
        $fields = Field::all();
        $menu = 'field';
        //return view('admin.field.index', ['fields' => $fields]);
        //return compact('fields','menu' );
        return view('admin.field.index', compact('fields','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menu = 'field';
        return view('admin.field.create',compact('menu'));
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
        //return $request->all();
        $field = new Field;
        $field->title = $request->title;
        $field->save();

        return redirect('admin\field')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $field = Field::find($id);
        //return $field;
        $menu = 'field';
        return view('admin.field.show',compact('field','id','menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $field = Field::find($id);
        $menu = 'field';
        return view('admin.field.edit',compact('field','id','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $field = Field::find($id);
        $field->title = $request->title;
        $field->save();

        return redirect('admin\field')->with('success', 'Information has been modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $field = Field::find($id);
        if($field->teachers->count() ==0 && $field->courses->count()==0){
            $field->delete();
            return redirect('admin\field')->with('success','Information has been  deleted');
        }
        return redirect('admin\field')->with('failed','can not remove Information');
    }
}
//https://appdividend.com/2018/02/23/laravel-5-6-crud-tutorial/
