<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = ['name'];

  public function posts() {
    // relation many to many (this[post] many)
    return $this->belongsToMany(Post::class)->withTimestamps();
  }
}
