<div class="col-md-4 col-xl-3">
  <div class="sidebar px-4 py-md-0">
    <h6 class="sidebar-title">Search</h6>
    <form class="input-group" target="#" method="GET">
      <input type="text" class="form-control" name="s" placeholder="Search">
      <div class="input-group-addon">
        <span class="input-group-text"><i class="ti-search"></i></span>
      </div>
    </form>
    <hr>
    <h6 class="sidebar-title">Categories</h6>
    <div class="row link-color-default fs-14 lh-24">
      @foreach($categories as $category)
        <div class="col-6">
          <a href="#">{{$category->name}}</a>
        </div>
      @endforeach
    </div>
    <hr>
    <h6 class="sidebar-title">Tags</h6>
    <div class="gap-multiline-items-1">
      @foreach($tags as $tag)
        <a class="badge badge-secondary" href="#">{{$tag->name}}</a>
      @endforeach
    </div>
    <hr>
  </div>
</div>