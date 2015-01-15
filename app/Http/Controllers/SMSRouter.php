<?php namespace App\Http\Controllers;

use App\Commands\QuoteProjectFromSMS;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SMSRouter extends Controller {

	public function route(Request $request)
  {
    $this->dispatchFrom(QuoteProjectFromSMS::class, $request);
  }

}
