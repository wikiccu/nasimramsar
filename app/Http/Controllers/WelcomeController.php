<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Teacher;
use App\Course;
use App\Field;
use App\Message;

class WelcomeController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $menu='welcome';
        $posts = Post::orderBy('id', 'DESC')->take(6)->get();
        $teachers = Teacher::orderBy('id')->take(4)->get();
        return view('welcome',compact('menu','posts','teachers'));
    }

    public function activity()
    {
        $fields = Field::all();
        $courses = Course::all();
        $menu='activity';
        return view('activity',compact('menu','fields','courses'));
    }

    public function news()
    {
        $menu='news';
        return view('welcome',compact('menu'));
    }

    public function gallery()
    {
        $menu='gallery';
        return view('welcome',compact('menu'));
    }

    public function about()
    {
        $fields = Field::all();
        $teachers = Teacher::all();
        $menu='about';
        return view('about',compact('menu','fields','teachers'));
    }

    public function contact()
    {
        $menu='contact';
        return view('contact',compact('menu'));
    }
    public function contactPost()
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required'
            ]);
        Message::create($request->all());

        return back()->with('success', 'Thanks for contacting us!');
        //return view('contact',compact('menu'));
    }



    public function post($id)
    {
        $menu='news';
        return view('welcome',compact('menu'));
    }

    public function teacher($id)
    {
        $menu='news';
        return view('welcome',compact('menu'));
    }

    public function course($id)
    {
        $menu='news';
        return view('welcome',compact('menu'));
    }

}
