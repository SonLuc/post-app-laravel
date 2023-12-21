@extends('post')
@section('main')
  <div class="banner-container">
    <img class="banner" src="{{ asset($post->image ?? 'img/laravel-logo.png' ) }}" alt="Post Image">
  </div>
  <section class="main-section container">
    <div class="row">
      <div class="col-md-9 post-container-text">
        <h1 class="post-title">{{ $post->title }}</h1>
        <p class="post-text">{!! nl2br(e($post->body)) !!}</p>
      </div>
      <div class="col-md-3">
      </div>
    </div>
  </section>
@endsection