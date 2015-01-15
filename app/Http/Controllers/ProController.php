<?php namespace App\Http\Controllers;

use App\Commands\RegisterProCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostProRequest;

class ProController extends Controller {

	public function postPro(PostProRequest $request)
	{
		$this->dispatchFrom(RegisterProCommand::class, $request);
	}

}
