<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;

class PhotoController extends Controller {

	public function viewPhoto($id)
	{
    $photo = Photo::find($id);
    $view = view('photo');
    return $view->with('photo', $photo);
	}

}
