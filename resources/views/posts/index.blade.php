@extends('layouts.app')
@section('content')
  <div class="d-flex justify-content-end mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
  </div>
  <div class="card card-default">
    <div class="card-header">
      Post
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead class="thead-light">
          <th>Image</th>
          <th>Title</th>
          <th width="10%"></th>
          <th width="10%"></th>
        </thead>
        <tbody>
          @foreach($posts as $post)
            <tr>
              <td><img src="storage/{{$post->image}}" alt="" width="40px" height="40px"></td>
              <td>{{$post->title}}</td>
              <td><a href="" class="btn btn-info btn-sm">Edit</a></td>
              <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
  <!-- <script type="text/javascript">
    $(document).ready(function(){
      $('.delete_form').on('submit', function(){
        if (confirm("ต้องการลบข้อมูลหรือไม่")) {
          return true;
        } else {
          return false;
        }
      })
    })
  </script> -->
@endsection
