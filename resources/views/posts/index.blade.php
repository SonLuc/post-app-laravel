@extends('crud')
@section('content')

  @auth
  <h1 class="main__title">Tus últimas publicaciones</h1>
  @endauth

  @guest
  <h1 class="main__title">Últimas publicaciones</h1>
  @endguest

  <div class="d-flex flex-column gap-3">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('success') }}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    @foreach ($posts as $post)
    <div class="card">
      <a href="{{ route('post', ['id' => $post->id]) }}" class="img-overlay">
        <img class="card-img-top" src="{{ asset($post->image ?? 'img/laravel-logo.png') }}" alt="Post Image">
      </a>
      <div class="card-body">
        <h3 class="card-title">{{ $post->title }}</h3>
        <p class="card-text">{{ $post->body }}</p>
      </div>
      <div class="card-footer">
        <div class="d-flex align-center justify-content-between">
          @auth
            <a href="{{ route('post', ['id' => $post->id]) }}" class="btn btn-blog">Ver públicación en la página</a>

            <span class="d-flex align-center gap-2">
              <a href="{{ route('edit-post', ['id' => $post->id]) }}" class="btn btn-edit">
                <i class='bx bx-edit'></i>
              </a>
              <form action="{{ route('destroy-post', [$post->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-delete">
                  <i class='bx bxs-trash'></i>
                </button>
              </form>
            </span>
          @endauth

          @guest
            <a href="{{ route('post', ['id' => $post->id]) }}" class="btn btn-blog">Ver públicación</a>
          @endguest
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection