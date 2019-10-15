<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Http\Middleware\VerifyCategory;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
      $this->middleware('verifyCategory')->only(['create', 'store']);
    }

    public function index()
    {
      return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
      $image = $request->image->store('posts');

      $post = Post::create([
        'title'=> $request->title,
        'description'=> $request->description,
        'content'=> $request->content,
        'image'=> $image,
        'category_id'=> $request->category
      ]);
      if ($request->tags) {
        $post->tags()->attach($request->tags);
      }

      Session()->flash('success', 'บันทึกข้อมูลเรียบร้อย');
      return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    // validate input in custom(UpdatePostRequest)
    {
      $data = $request->only(['title', 'description', 'content', 'category']);
      $data['category_id'] = $data['category'];
      if ($request->hasfile('image')) { // เช็คว่ามีการอัปโหลดภาพใหม่มาหรือไม่
        $image = $request->image->store('posts'); // รับค่าจาก store ที่มีการอัปโหลดภาพล่าสุดเข้ามา
        $post->deleteImage(); // ลบภาพเก่า
        $data['image'] = $image;
      }
      if ($request->tags) {
        $post->tags()->sync($request->tags);
      }
      $post->update($data);

      Session()->flash('success', 'อัปเดตข้อมูลเรียบร้อย');
      return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete(); // ลบข้อมูลในฐานข้อมูล
      $post->deleteImage(); // ลบรูปใน storage_path

      Session()->flash('success', 'ลบข้อมูลเรียบร้อย');
      return redirect(route('posts.index'));
    }
}
