<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Project extends Model {

  protected $fillable = ['tag', 'desc', 'zip', 'cell'];

  public function pros()
  {
    return $this->belongsToMany(Pro::class);
  }

  public function rfqs()
  {
    return $this->hasMany(ProProject::class);
  }

  public function relay()
  {
    return $this->belongsTo(Relay::class);
  }

  public function quotes()
  {
    return $this->hasManyThrough(Quote::class, ProProject::class);
  }

  public function photos()
  {
    return $this->hasMany(Photo::class);
  }

  public function scopeQualified($query, $pro)
  {
    return $query->whereZip($pro->zip)->whereTag($pro->tag);
  }

  public function setCellAttribute($value)
  {
    $this->attributes['cell'] = '+1'.$value;
  }

} 