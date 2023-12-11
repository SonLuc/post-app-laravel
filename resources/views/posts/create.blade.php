@extends('crud')
@section('content')
  <h1 class="main__title">Crea una nueva públicación</h1>
  <div class="form-container">
    <form class="form" action="{{ route('create-post') }}" method="post" enctype="multipart/form-data">
      @csrf

      @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @error('title')
      <h6 class="alert alert-danger">{{ $message }}</h6>
      @enderror

      <div class="mb-3">
        <label class="form-label" for="title">Titulo</label>
        <input class="form-control" type="text" name="title" id="title" placeholder="Ventajas de Laravel 10...">
      </div>
      <div class="mb-3">
        <label class="form-label" for="content">Contenido</label>
        <textarea class="form-control" name="body" id="content" cols="30" rows="4" placeholder="Lorem ipsum dolor sit, amet consectetur adipisicing elit...."></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label" for="image" class="file-input-label">Imagen descriptiva</label>
        <input class="form-control" type="file" name="image" id="image" class="file-input">
      </div>
      <button class="btn btn-blog w-100" type="submit">Publicar</button>
    </form>
  </div>  
@endsection