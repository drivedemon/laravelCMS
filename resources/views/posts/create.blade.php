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
      {{isset($post)?"Edit Post":"Add Post"}}
    </div>
    <div class="card-body">
      <form action="{{isset($post)?route('posts.update', $post->id):route('posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if(isset($post))
          @method('put')
        @endif
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" value="{{isset($post)?$post->title:''}}">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" rows="4" cols="4" class="form-control">{{isset($post)?$post->description:''}}</textarea>
        </div>
        <div class="form-group">
          <label for="content">Content</label>
          <input id="x" type="hidden" name="content" value="{{isset($post)?$post->content:''}}">
          <trix-editor input="x"></trix-editor>
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" value="" class="form-control">
        </div>
        <div class="form-group">
          <label for="Category">Category</label>
          <select class="form-control" name="category">
            <option value="">- กรุณาเลือก -</option>
            @foreach($categories as $category)
              <option value="{{$category->id}}"
                @if (isset($post))
                  @if ($category->id == $post->category_id)
                    selected
                  @endif
                @endif
                >
                {{$category->name}}
              </option>
            @endforeach
          </select>
        </div>
        @if ($tags->count() > 0)
          <div class="form-group">
            <label for="Category">Tag</label>
            <select class="form-control" name="tags[]" id="select_tags" multiple>
              @foreach($tags as $tag)
                <option value="{{$tag->id}}"
                  @if (isset($post))
                    @if ($post->hasTag($tag->id))
                      selected
                    @endif
                  @endif
                  >
                  {{$tag->name}}
                </option>
              @endforeach
            </select>
          </div>
        @endif
        <div class="form-group">
          <input type="submit" name="" value="{{isset($post)?'Edit Post':'Add Post'}}" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#select_tags').select2();
    });
  </script>
@endsection
