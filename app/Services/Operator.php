<?php namespace App\Services;

use Services_Twilio;


class Operator {

  private $client;

  public function __construct()
  {
    $sid = env('TWILIO_SID');
    $token = env('TWILIO_TOKEN');
    $this->client = new Services_Twilio($sid, $token);
  }

  public function sendMMS($to, $from, $body, $photos = null)
  {
//    $this->client->account->messages->sendMessage($from, $to, $body, $photos);
  }

  public function reserveNumber($project)
  {
    $number = Number::available();
    $number->projects()->save($project);
  }

} 