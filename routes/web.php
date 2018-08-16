<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

//Route::resource('/admin/field', 'Admin\FieldController');
//Route::resource('/admin/subject', 'Admin\SubjectController');
Route::resources([
    '/admin/course'  => 'Admin\CourseController',
    '/admin/field'   => 'Admin\FieldController',
    '/admin/message' => 'Admin\MessageController',
    '/admin/post'    => 'Admin\PostController',
    '/admin/subject' => 'Admin\SubjectController',
    '/admin/teacher' => 'Admin\TeacherController'
    ]);
//php artisan make:controller Admin\TeacherController --resource --model=Teacher