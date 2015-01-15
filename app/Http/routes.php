<?php

use App\Photo;
use App\Project;
use App\Relay;
use Illuminate\Support\Facades\File;
use Knp\Snappy\Image;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('admin', 'AdminController@overview');
Route::get('admin/api', 'AdminController@overviewAPI');

Route::get('home', 'HomeController@index');

Route::post('s3/signature', 'S3Controller@postSignature');

Route::post('projects', 'ProjectsController@postProject');

Route::post('pros', 'ProController@postPro');

Route::get('sms/router', 'SMSRouter@route');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('relay', function(){
  Relay::create(['number' => 4074774522]);
});

Route::get('project/{id}', function($id) {
  $project = Project::find($id);
  $view = view('project');
  return $view->with('project', $project);
});

Route::get('photo/{id}', function($id) {
  $photo = Photo::find($id);
  $view = view('photo');
  return $view->with('photo', $photo);
});