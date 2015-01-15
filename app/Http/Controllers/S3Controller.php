<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Response;

class S3Controller extends Controller {

  private $serverPublicKey;

  private $serverPrivateKey;

  public function __construct()
  {
    $this->serverPublicKey = getenv('S3_PUBLIC');
    $this->serverPrivateKey = getenv('S3_PRIVATE');
  }

  public function postSignature(Request $request)
  {

    $policy = base64_encode(json_encode($request->all()));

    $response = [
      'policy' => $policy,
      'signature' => $this->signPolicy($policy)
    ];

    return Response::json($response);

  }

  private function signPolicy($policy)
  {
    return base64_encode(hash_hmac('sha1', $policy, $this->serverPrivateKey, true));
  }

}
