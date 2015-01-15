<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Relay extends Model {

  protected $fillable = ['number'];

  public function projects()
  {
    return $this->hasMany(Project::class);
  }

  public function scopeAvailable($query, $project)
  {
    return $query->whereHas('projects', function($q) use ($project)
    {
      $q->where('zip', 'booya'); // TODO: change to $project->zip or similar
      $q->where('status', 1);
    }, '<', 1);
  }

} 