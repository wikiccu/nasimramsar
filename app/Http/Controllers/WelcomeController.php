<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Teacher;

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
        $menu='activity';
        return view('welcome',compact('menu'));
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
        $menu='about';
        return view('welcome',compact('menu'));
    }

    public function contact()
    {
        $menu='contact';
        return view('welcome',compact('menu'));
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
