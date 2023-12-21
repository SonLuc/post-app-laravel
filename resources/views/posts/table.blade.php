@extends('dashboard')
@section('content')


@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@error('title')
<h6 class="alert alert-danger">{{ $message }}</h6>
@enderror

<h1 class="main__title">Publicaciones</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"><strong>#</strong></th>
      <th scope="col">Imagen</th>
      <th scope="col">Titulo</th>
      <th scope="col">Cuerpo</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post )
    <tr>
      <td scope="row"><b>{{ $post->id }}</b></td>
      <td>
        <img class="img-fluid table-image" src="{{ asset($post->image ?? 'img/laravel-logo.png') }}" alt="Post Imagen">
      </td>
      <td>{{ $post->title }}</td>
      <td class="table-body">
          {{ $post->body }}
      <td>
        <div class="d-flex align-center gap-2"> 
          <a href="{{ route('edit-post', ['id' => $post->id]) }}" class="table-btn table-btn-edit"><i class='bx bxs-edit' ></i></a>
          <a href="#" class="table-btn table-btn-delete" data-bs-toggle="modal" data-bs-target="#modal{{ $post->id }}"><i class='bx bxs-trash' ></i></a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal{{ $post->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $post->title }}" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar post "{{ $post->title }}"</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-blog" data-bs-dismiss="modal">No, no estoy seguro</button>
                <form action="{{ route('destroy-post', [$post->id]) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-blog-2">Si, eliminar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection