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

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
