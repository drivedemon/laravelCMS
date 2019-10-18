<!DOCTYPE html>
@extends('layouts.blog')
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

      @section('title')
        <title>
            Web-blogs
        </title>
      @endsection

  </head>

  <body>
    @section('header')
      <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #1b1b1b 0%, #1b1b1b 48%, #1b1b1b 100%);">
        <div class="container">

          <div class="row">
            <div class="col-md-8 mx-auto">
              <h1>Laravel Framework</h1>
              <p class="lead-2 opacity-90 mt-3">Basic CMS</p>
            </div>
          </div>

        </div>
      </header>
    @endsection
    @section('content')
    <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">
                @foreach($posts as $post)
                  <div class="col-md-6">
                    <div class="card border hover-shadow-6 mb-6 d-block">
                      <a href="{{route('blog.show', $post->id)}}">
                        <img style="width:100%; height:250px;" class="card-img-top" src="storage/{{$post->image}}" alt="Card image cap">
                      </a>
                      <div class="p-6 text-center">
                        <p>
                          <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{route('blog.show', $post->id)}}">{{$post->category->name}}</a>
                        </p>
                        <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show', $post->id)}}">{{$post->title}}</a></h5>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              {{$posts->appends(['search'=>request()->query('search')])->links()}}
            </div>
            @include('layouts.sidebar')
          </div>
        </div>
      </div>
    </main>
    @endsection
  </body>
</html>
