<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;

class WelcomeController extends Controller
{
  public function index() {
    return view('welcome')
    ->with('categories', Category::all())
    ->with('posts', Post::paginate(4))
    ->with('tags', Tag::all());
  }
}
