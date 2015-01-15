<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model {

  protected $fillable = ['body'];

  public function rfq()
  {
    return $this->belongsTo(ProProject::class, 'pro_project_id');
  }

} 