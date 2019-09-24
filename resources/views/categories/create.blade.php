@extends('layouts.app')
@section('content')
  <div class="card card-default">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="list-group">
          @foreach($errors->all() as $error)
            <li class="list-group-item">{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="card-header">
      {{isset($category)?"Edit Category":"Add Category"}}
    </div>
    <div class="card-body">
      <form action="{{isset($category)?route('categories.update', $category->id):route('categories.store')}}" method="post">
        @csrf
        @if(isset($category))
          @method('put')
        @endif
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" name="name" value="{{isset($category)?$category->name:''}}">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success" name="" value="{{isset($category)?'Update Category':'Add Category'}}">
        </div>
      </form>
    </div>
  </div>
@endsection
