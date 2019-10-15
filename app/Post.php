<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
  protected $fillable = ['title','description','content','image','category_id'];

  public function category() {
    // relation 1 to many (this[category] one)
    return $this->belongsTo(Category::class);
  }

  public function tags() {
    // relation many to many (this[tag] one)
    return $this->belongsToMany(Tag::class);
  }

  // create function delete image when upload now
  public function deleteImage() {
    Storage::delete($this->image);
  }

  // create function check tag id in view edit
  public function hasTag($tagId) {
    return in_array($tagId, $this->tags->pluck('id')->toArray());
  }
}
