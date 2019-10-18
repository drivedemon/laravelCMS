<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
  public function show(Post $post) {
    return view('blog.show')->with('post', $post);
  }
  public function category(Category $category) {
    return view('blog.category')
    ->with('categories', Category::all())
    ->with('tags', Tag::all())
    ->with('category', $category)
    ->with('posts', $category->post()->paginate(4));
  }
  public function tag(Tag $tag) {
    return view('blog.tag')
    ->with('categories', Category::all())
    ->with('tags', Tag::all())
    ->with('tag', $tag)
    ->with('posts', $tag->posts()->paginate(4));
  }
}
