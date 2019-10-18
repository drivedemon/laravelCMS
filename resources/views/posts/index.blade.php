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
      @if ($posts->count() > 0)
        <table class="table table-bordered">
          <thead class="thead-light">
            <th class="text-center" width="20%">Image</th>
            <th>Title</th>
            <th class="text text-center" width="10%">Category</th>
            <th width="10%"></th>
            <th width="10%"></th>
          </thead>
          <tbody>
            @foreach($posts as $post)
              <tr>
                <td align="center"><img src="storage/{{$post->image}}" alt="" width="90px" height="70px"></td>
                <td>{{$post->title}}</td>
                <!-- call syntax post function in modal post -->
                <td><a href="{{route('categories.edit', $post->category->id)}}">{{$post->category->name}}</a></td>
                <td>
                  <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <form class="delete_form" action="{{route('posts.destroy', $post->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" name="" value="Delete" class="btn btn-danger btn-sm">
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <h3 class="text text-center">No Post</h3>
      @endif
      {{$posts->links()}}
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.delete_form').on('submit', function(){
        if (confirm("ต้องการลบข้อมูลหรือไม่")) {
          return true;
        } else {
          return false;
        }
      })
    })
  </script>
@endsection
