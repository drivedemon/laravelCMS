<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
  protected $fillable = ['title','description','content','image'];

  public function category() {
    // relation 1 to many (this[category] one)
    return $this->belongsTo(Category::class);
  }

  // create function delete image when upload now
  public function deleteImage() {
    Storage::delete($this->image);
  }
}
