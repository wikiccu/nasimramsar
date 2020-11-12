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
// Route::get('/test', function () {
//     return view('test');
// });

Auth::routes();

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/activity', 'WelcomeController@activity')->name('activity');
Route::get('/news/{subject_id?}', 'WelcomeController@news')->name('news');
Route::get('/gallery', 'WelcomeController@gallery')->name('gallery');
Route::get('/about', 'WelcomeController@about')->name('about');
Route::get('/contact', 'WelcomeController@contact')->name('contact');
Route::post('/contact', 'WelcomeController@contactPost')->name('contactPost');

Route::get('/teacher/{id}', 'WelcomeController@teacher')->name('teacher');
Route::get('/course/{id}', 'WelcomeController@course')->name('course');
Route::get('/post/{id}', 'WelcomeController@post')->name('post');
Route::get('/galleryImage/{id}', 'WelcomeController@galleryImage')->name('galleryImage');

Route::get('/home', 'HomeController@index')->name('home');
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
Route::resource('photos', 'ProductController');
//froala
Route::post('/uploadfile','Admin\AdminController@upload');
Route::post('/deletefile','Admin\AdminController@delete');
Route::DELETE('/fileuploads', 'Admin\AdminController@destroy');

//image in gallery
Route::DELETE('/deleteGalleryImage', 'Admin\GalleryController@destroyImage');
Route::post('/changeGalleryImageTitle', 'Admin\GalleryController@changeImageTitle');

//site-map
//https://gitlab.com/Laravelium/Sitemap
Route::get('sitemap', function() {

	// create new sitemap object
	$sitemap = App::make('sitemap');

	// set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
	// by default cache is disabled
	$sitemap->setCache('laravel.sitemap', 60);

	// check if there is cached sitemap and build new only if is not
	if (!$sitemap->isCached()) {
		// add item to the sitemap (url, date, priority, freq)
		$sitemap->add(URL::to(''), '2018-08-25T20:10:00+02:00', '1.0', 'daily');
		$sitemap->add(URL::to('news'), '2018-08-26T12:30:00+02:00', '0.9', 'daily');
		$sitemap->add(URL::to('gallery'), '2018-08-26T12:30:00+02:00', '0.9', 'daily');
		$sitemap->add(URL::to('about'), '2018-08-26T12:30:00+02:00', '0.9', 'monthly');
		$sitemap->add(URL::to('contact'), '2018-08-26T12:30:00+02:00', '0.9', 'monthly');

		// get all posts from db
		$posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

		// add every post to the sitemap
		foreach ($posts as $post) {
			$sitemap->add(URL::to('/post/'.$post->id), $post->updated_at, $post->published,'daily');
        }

		// get all courses from db
		$courses = DB::table('courses')->orderBy('created_at', 'desc')->get();

		// add every course to the sitemap
		foreach ($courses as $course) {
			$sitemap->add(URL::to('/course/'.$course->id), $course->updated_at, '0.5','daily');
        }

		// get all teachers from db
		$teachers = DB::table('teachers')->orderBy('created_at', 'desc')->get();

		// add every teacher to the sitemap
		foreach ($teachers as $teacher) {
			$sitemap->add(URL::to('/teacher/'.$teacher->id), $teacher->updated_at, '0.5','daily');
        }


		// get all teachers from db
		$galleryImages = DB::table('images')->orderBy('created_at', 'desc')->get();

		// add every teacher to the sitemap
		foreach ($galleryImages as $galleryImage) {
			$sitemap->add(URL::to('/galleryImage/'.$galleryImage->id), $galleryImage->updated_at, '0.5','daily');
		}
	}

	// show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
	return $sitemap->render('xml');
});
