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
        //return view('admin.fields.index', ['fields' => $fields]);
        return view('admin.fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.fields.create');
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
        $field->Title = $request->Title;
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
        return view('admin.fields.show',compact('field','id'));
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
        return view('admin.fields.edit',compact('field','id'));
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
        $field->Title = $request->Title;
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
        $field->delete();
        return redirect('admin\field')->with('success','Information has been  deleted');
    }
}
//https://appdividend.com/2018/02/23/laravel-5-6-crud-tutorial/
