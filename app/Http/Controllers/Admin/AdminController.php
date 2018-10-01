<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FileUpload;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.admin', ['menu' => 'admin']);
    }

    public function upload(Request $request){
    	$input 				= $request->all();
    	$location 			= $input['location'];

		$fileData 			= $request->file('image'); //this gets the image data for 1st argument
        // $filename 			= $fileData->getClientOriginalName();
        $filename           = $_FILES['image']['name'];
        // $completePath 		= url('/' . $location . '/' . $filename);
        $destinationPath 	= 'images/';
        $request->file('image')->move($destinationPath, $filename);
		$completePath = url('/' . $destinationPath . $filename);

		$fileupload = new FileUpload;
		$fileupload->title = $filename;
		$fileupload->path = $completePath;
		$fileupload->save();
		// if($fileupload->save()){
			return stripslashes(response()->json(['link' => $completePath])->content());
		// }
	}

    public function destroy(Request $request){
    	$input = $request->all();
    	$url = parse_url($input['src']);
    	$splitPath = explode("/", $url["path"]);
    	$splitPathLength = count($splitPath);
    	FileUpload::where('path', 'LIKE', '%' . $splitPath[$splitPathLength-1] . '%')->delete();
    }
}
