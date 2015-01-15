<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Pro extends Model {

  protected $fillable = ['name', 'tag', 'zip', 'cell'];

  public function scopeQualified($query, $project)
  {
    return $query->whereZip($project->zip)->whereTag($project->tag);
  }

  public function projects()
  {
    return $this->belongsToMany(Project::class);
  }

  public function setCellAttribute($value)
  {
    $this->attributes['cell'] = '+1'.$value;
  }

} 