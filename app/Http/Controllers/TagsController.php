<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\CreateTagsRequest;
use App\Http\Requests\UpdateTagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagsRequest $request) // action when press submit form
    // validate input in custom(CreateCategoryRequest)
    {
      // insert data to db
      Tag::create(['name'=>$request->name]);
      // session to show front end
      Session()->flash('success', 'บันทึกข้อมูลเรียบร้อย');
      // redirect page
      return redirect(route('tags.index'));
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
    public function edit(Tag $tag)
    {
      return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagsRequest $request, Tag $tag) // Tag $tag == mean is call modal Tag
    // validate input in custom(UpdateCategoryRequest)
    {
      // update data to db by [Category method]
      $tag->update([
        'name' => $request->name
      ]);
      // session to show front end
      Session()->flash('success', 'อัปเดตข้อมูลเรียบร้อย');
      // redirect page
      return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
      // delete data to db by [Category method]
      $tag->delete();
      // session to show front end
      Session()->flash('success', 'ลบข้อมูลเรียบร้อย');
      // redirect page
      return redirect(route('tags.index'));
    }
}
