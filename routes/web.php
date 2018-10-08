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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/test', function () {return view('test');});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\AdminController@index')->name('admin');

Route::resources(
    [
    '/admin/subject' => 'Admin\SubjectController',
    '/admin/post'    => 'Admin\PostController',
    '/admin/field'   => 'Admin\FieldController',
    '/admin/course'  => 'Admin\CourseController',
    '/admin/teacher' => 'Admin\TeacherController',
    '/admin/teachercourse' => 'Admin\TeacherCourseController',
    '/admin/gallery' => 'Admin\GalleryController',
    '/admin/message' => 'Admin\MessageController',
    ]);

//froala
Route::post('/uploadfile','Admin\AdminController@upload');
Route::post('/deletefile','Admin\AdminController@delete');
Route::DELETE('/fileuploads', 'Admin\AdminController@destroy');

//delete image in gallery
Route::DELETE('/deleteGalleryImage', 'Admin\GalleryController@destroyImage');
