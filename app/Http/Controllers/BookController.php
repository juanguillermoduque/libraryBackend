<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    //se Crea metodo que permite listar todos los libros
    public function list()
    {
        return Book::all();
    }

    //se crea metodo que permite crear un libro, se valida que los campos sean enviados y que cumplan con las reglas establecidas
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string',
            'date_post' => 'required|date',
            'genre' => 'required|string',
        ]);
        return Book::create($validated);
    }

    //se crea metodo que permite obtener un libro por su id
    public function getOne($id)
    {
        return Book::findOrFail($id);
    }

    //se crea metodo que permite actualizar un libro por su id
    public function update(Request $request, $id)
    {
        $post = Book::findOrFail($id);
        $post->update($request->all());
        return $post;
    }

    //se crea metodo que permite eliminar un libro por su id
    public function delete($id)
    {
        Book::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
