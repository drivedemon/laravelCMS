<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('categories.index')->with('categorys', Category::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    // validate input in custom(CreateCategoryRequest)
    {
      // insert data to db
      Category::create(['name'=>$request->name]);
      // session to show front end
      Session()->flash('success', 'บันทึกข้อมูลเรียบร้อย');
      // redirect page
      return redirect(route('categories.index'));
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
    public function edit(Category $category)
    {
      return view('categories.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    // validate input in custom(UpdateCategoryRequest)
    {
      // update data to db by [Category method]
      $category->update([
        'name' => $request->name
      ]);
      // session to show front end
      Session()->flash('success', 'อัปเดตข้อมูลเรียบร้อย');
      // redirect page
      return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      // check count post before delete
      if ($category->post->count() > 0) {
        Session()->flash('error', 'ไม่สามารถลบได้เนื่องจากมีบทความใช้งานอยู่');
        return redirect()->back();
      }
      // delete data to db by [Category method]
      $category->delete();
      // session to show front end
      Session()->flash('success', 'ลบข้อมูลเรียบร้อย');
      // redirect page
      return redirect(route('categories.index'));
    }
}
