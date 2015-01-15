<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProProject extends Model {

  protected $table = "pro_project";

  public function quote()
  {
    return $this->hasOne(Quote::class);
  }

  public function pro()
  {
    return $this->belongsTo(Pro::class);
  }

  public function project()
  {
    return $this->belongsTo(Project::class);
  }

  public function scopeFrom($query, $cell)
  {
    return $query->whereHas('pro', function($q) use ($cell)
    {
      $q->whereCell($cell);
    });
  }
  public function scopeTo($query, $relay)
  {
    return $query->whereHas('project', function($q) use ($relay)
    {
      $q->whereRelay($relay);
    });
  }

} 