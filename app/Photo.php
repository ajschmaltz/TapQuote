<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

  protected $fillable = ['src', 'caption'];

  public function project()
  {
    return $this->belongsTo(Project::class);
  }

} 