<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Project;

class AdminController extends Controller {

  public function overview()
  {
    return view('admin');
  }

	public function overviewAPI()
  {
    return Project::with('relay', 'pros', 'rfqs', 'quotes')->get();
  }

}
