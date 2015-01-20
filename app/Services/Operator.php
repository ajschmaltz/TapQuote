<?php namespace App\Services;

use App\Project;
use App\Relay;
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
    if(is_array($to)){
      foreach($to as $t){
        $this->client->account->messages->sendMessage($from, $t, $body, $photos);
      }
    }
    $this->client->account->messages->sendMessage($from, $to, $body, $photos);
  }

  public function availableRelay(Project $project){
    return Relay::available($project)->first();
  }

  public function reserveRelay(Project $project)
  {
    $relay = $this->availableRelay($project);

    if(is_null($relay)) {
      $relay = Relay::create(['number' => $this->buyRelay()->phone_number]);
    }

    $project->relay()->associate($relay)->save();

  }

  public function buyRelay($area_code = 321)
  {
    return $this->client->account->incoming_phone_numbers->create(array('AreaCode' => $area_code));
  }

} 