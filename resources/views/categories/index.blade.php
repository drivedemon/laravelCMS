@extends('layouts.app')
@section('content')
  <div class="d-flex justify-content-end mb-2">
    <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
  </div>
  <div class="card card-default">
    <div class="card-header">
      Category
    </div>
    <div class="card-body">
      <!-- check count data -->
      @if($categorys->count() > 0)
        <table class="table table-bordered">
          <thead class="thead-light">
            <th width="70%">Name</th>
            <th class="text text-center" width="10%">Total post</th>
            <th width="10%"></th>
            <th width="10%"></th>
          </thead>
          <tbody>
            @foreach($categorys as $category)
              <tr>
                <td>{{$category->name}}</td>
                <td align="center">
                  <!-- call syntax post function in modal post -->
                  {{$category->post->count()}}
                </td>
                <td align="center">
                  <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <form class="delete_form" action="{{route('categories.destroy', $category->id)}}" method="post">
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
        <h3 class="text text-center">No Category</h3>
      @endif
      {{$categorys->links()}}
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
