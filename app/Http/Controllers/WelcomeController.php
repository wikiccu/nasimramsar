<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Subject;
use App\Teacher;
use App\Course;
use App\Field;
use App\Gallery;
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
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();

        $posts = Post::orderBy('id', 'DESC')->take(6)->get();
        $teachers = Teacher::orderBy('id')->take(4)->get();
        return view('welcome',compact('menu', 'last_gallery_photo','posts','teachers'));
    }

    public function activity()
    {
        $menu='activity';
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();

        $fields = Field::all();
        $courses = Course::all();
        return view('activity',compact('menu', 'last_gallery_photo','fields','courses'));
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
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();

        return view('news',compact('menu', 'last_gallery_photo','subjects','posts','this_subject','all_posts_number'));
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        $menu='gallery';
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();

        return view('gallery',compact('menu', 'last_gallery_photo','galleries'));
    }

    public function about()
    {
        $fields = Field::all();
        $teachers = Teacher::all();
        $menu='about';
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();

        return view('about',compact('menu', 'last_gallery_photo','fields','teachers'));
    }

    public function contact()
    {
        $menu='contact';
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();

        return view('contact',compact('menu', 'last_gallery_photo'));
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
        //return view('contact',compact('menu', 'last_gallery_photo'));
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
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();

        $subjects = Subject::all();
        $all_posts_number = Post::all()->count();
        return view('post',compact('menu', 'last_gallery_photo','post','subjects','all_posts_number','page_title'));
    }

    public function teacher($id)
    {
        $teacher = Teacher::find($id);
        $menu='about';
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();
        return view('teacher',compact('menu', 'last_gallery_photo','teacher'));
    }

    public function course($id)
    {
        $course = Course::find($id);
        $menu='activity';
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();
        return view('course',compact('menu', 'last_gallery_photo','course'));
    }

    public function galleryImage($id)
    {
        $gallery = Gallery::find($id);
        $menu='gallery';
        $last_gallery_photo = Gallery::orderBy('id', 'DESC')->take(6)->get();
        return view('galleryImage',compact('menu', 'last_gallery_photo','gallery'));
    }

}
