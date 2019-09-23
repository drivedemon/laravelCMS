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
      Create Category
    </div>
    <div class="card-body">
      <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" name="name" value="">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success" name="" value="Add Category">
        </div>
      </form>
    </div>
  </div>
@endsection
