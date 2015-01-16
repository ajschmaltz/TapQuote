<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use App\Commands\PostProjectCommand;

class ProjectsController extends Controller {

	/**
	 * Post a Job
	 */
	public function postProject(PostProjectRequest $request)
	{
		return $this->dispatchFrom(PostProjectCommand::class, $request);
	}

  public function viewProject($id)
  {
    $project = Project::find($id);
    $view = view('project');
    return $view->with('project', $project);
  }

}
