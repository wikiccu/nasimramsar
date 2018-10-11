<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FroalaFileUpload;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('active');
        $this->middleware('role:admin');
    }
    //
    public function index()
    {
        return view('admin.admin', ['menu' => 'admin']);
    }

    public function upload(Request $request){
    	$input 				= $request->all();
    	$location 			= $input['location'];

		$fileData 			= $request->file('file'); //this gets the image data for 1st argument
        // $filename 			= $fileData->getClientOriginalName();
        $filename           = time().$_FILES['file']['name'];
        // $completePath 		= url('/' . $location . '/' . $filename);
        $destinationPath 	= 'images/froalafiles/';
        $request->file('file')->move($destinationPath, $filename);
		$completePath = url('/' . $destinationPath . $filename);

		$fileupload = new FroalaFileUpload;
		$fileupload->title = $filename;
        $fileupload->path = $completePath;
		$fileupload->save();
		// if($fileupload->save()){
			return stripslashes(response()->json(['link' => $completePath])->content());
		// }
	}

    public function delete(Request $request){
    	$input = $request->all();
    	$url = parse_url($input['src']);
    	$splitPath = explode("/", $url["path"]);
        $splitPathLength = count($splitPath);
        $filename=$splitPath[$splitPathLength-1];
        if(file_exists(public_path('images/froalafiles/'.$filename)))
        {
            unlink(public_path('images/froalafiles/'.$filename));
        }
        FroalaFileUpload::where('path', 'LIKE', '%' . $filename . '%')->delete();
    }
}
