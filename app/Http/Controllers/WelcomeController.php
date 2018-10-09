<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Subject;
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

    public function news($subject_id = null)
    {
        $subjects = Subject::all();
        $posts = Post::orderBy('id', 'DESC')->get();
        $this_subject = "آخرین اخبار و مقالات موسسه نسیم";
        if($subject_id)
        {
            $posts = Post::where('subject_id',$subject_id)->orderBy('id', 'DESC')->get();
            $this_subject = Subject::find($subject_id)->title;
        }
        else
        {
            $posts = Post::orderBy('id', 'DESC')->get();
            $this_subject = "آخرین اخبار و مقالات موسسه نسیم";
        }
        $all_posts_number = Post::all()->count();
        $menu='news';
        return view('news',compact('menu','subjects','posts','this_subject','all_posts_number'));
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
    public function contactPost(Request $request)
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
        $post = Post::find($id);
        if($post)
        {
            $page_title = $post->title;
        }
        else
        {
            $page_title = "خبر پیدا نشد";
        }
        $menu='news';
        $subjects = Subject::all();
        $all_posts_number = Post::all()->count();
        return view('post',compact('menu','post','subjects','all_posts_number','page_title'));
    }

    public function teacher($id)
    {
        $menu='about';
        return view('teacher',compact('menu'));
    }

    public function course($id)
    {
        $menu='activity';
        return view('course',compact('menu'));
    }

}
