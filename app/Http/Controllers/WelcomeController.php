<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;

class WelcomeController extends Controller
{
  public function index() {
    // get value search by query in submit form || this is GET method
    $search = request()->query('search');
    // query with condition by string
    if ($search) {
      $post = Post::where('title', 'LIKE', "%{$search}%")->paginate(1);
    } else {
      $post = Post::paginate(3);
    }
    return view('welcome')
    ->with('categories', Category::all())
    ->with('posts', $post)
    ->with('tags', Tag::all());
  }
}
