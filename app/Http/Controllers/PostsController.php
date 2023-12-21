<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;

class PostsController extends Controller
{
  /**
   * Se utilizan ciertas convenciones para los nombres de los métodos de los controladores.
   * 
   * index: para mostrar una lista de posts.
   * store: para guardar un nuevo post en la base de datos.
   * update: para actualizar un post existente en la base de datos.
   * destroy: para eliminar un post existente de la base de datos.
   * edit: para mostrar un formulario para editar un post existente.
   */

  // Método para mostrar una lista de posts
  public function index()
  {
    $posts = Post::all();
    return view('posts.index', compact('posts'));
  }

  // Método para guardar un nuevo post en la base de datos
  public function store(PostStoreRequest $req)
  {
    $post = new Post;

    if ($req->hasFile('image')) 
    {
      $file = $req->file('image');
      $path = 'img/';
      $fileName = time() . '-' . $file->getClientOriginalName();
      $uploadSuccess = $file->move($path, $fileName);
      $post->image = $path . $fileName;
    }

    $post->title = $req->title;
    $post->body = $req->body;
    $post->save();

    return redirect()->route('create-post')->with('success', 'Post creado correctamente');
  }

  // Método para mostrar el formulario de edición con los datos del post
  public function edit($id)
  {
    $post = Post::find($id);
    return view('posts.edit', compact('post'));
  }

  // Método para actualizar un post existente en la base de datos
  public function update(PostUpdateRequest $req, $id)
  {

    $post = Post::find($id);

    // Eliminamos la imagen anterior solo si se proporciona una nueva imagen
    if ($req->hasFile('image')) {
      if (file_exists($post->image)) unlink($post->image);

      // Obtener el archivo
      $file = $req->file('image');
      $path = 'img/';
      $fileName = time() . '-' . $file->getClientOriginalName();
      $uploadSuccess = $file->move($path, $fileName);
      $post->image = $path . $fileName;
    }

    $post->title = $req->title;
    $post->body = $req->body;

    $post->save();

    return redirect()->route('edit-post', ['id' => $post->id])->with('success', 'Post actualizado correctamente');
  }

  // Método para eliminar un post existente de la base de datos
  public function destroy($id)
  {
    $post = Post::find($id);

    // Eliminamos la imagen del post
    if (file_exists($post->image)) {
      unlink($post->image);
    }
    $post->delete();

    return redirect()->back()->with('success', 'Post eliminado correctamente');
  }

  // Método para mostrar un post específico
  public function show($id)
  {
    $post = Post::find($id);
    return view('posts.show', compact('post'));
  }

  // Método para mostrar una tabla con los posts
  public function table()
  {
    $posts = Post::all();
    return view('posts.table', compact('posts'));
  }
}
