<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Book;

class BookCrudTest extends TestCase
{
    // Limpia la base de datos después de cada prueba
    use RefreshDatabase;  

    // Prueba para crear un libro
    /** @test */
    public function it_can_create_a_book()
    {
        // Envía una petición para crear un libro
        $response = $this->postJson('/api/books', [
            'title' => 'El mundo magico',
            'author' => 'Chophower',
            'date_post' => '2024-12-27',
            'genre' => 'Ficción',
        ]);

        // Verifica que la respuesta tenga un código 201 (creado)
        $response->assertStatus(201); 
        $this->assertDatabaseHas('books', [
            'title' => 'El mundo magico',
            'author' => 'Chophower',
        ]);
    }

    // Prueba para obtener un libro por su id
    /** @test */
    public function it_can_read_a_book()
    {
        // Crea un libro en la base de datos
        $book = Book::factory()->create();  

        // Envía una petición para obtener el libro
        $response = $this->getJson("/api/books/{$book->id}");

        // Verifica que la respuesta tenga un código 200 (ok)
        $response->assertStatus(200); 
        $response->assertJson([
            'id' => $book->id,
            'title' => $book->title,
        ]);
    }

    // prueba para editar un libro por su id
    /** @test */
    public function it_can_update_a_book()
    {
        // Crea un libro en la base de datos
        $book = Book::factory()->create();

        // Envía una petición para actualizar el libro
        $response = $this->putJson("/api/books/{$book->id}", [
            'title' => 'Nuevo título',
            'author' => 'Nuevo autor',
            'date_post' => '2024-12-28',
            'genre' => 'Novela',
        ]);

        // Verifica que la respuesta sea 200 (ok)
        $response->assertStatus(200);  
        $this->assertDatabaseHas('books', [
            'title' => 'Nuevo título',
            'author' => 'Nuevo autor',
        ]);
    }

    // Prueba para eliminar un libro por su id
    /** @test */
    public function it_can_delete_a_book()
    {

        // Crea un libro en la base de datos
        $book = Book::factory()->create();

        // Envía una petición para eliminar el libro
        $response = $this->deleteJson("/api/books/{$book->id}");

        // Verifica que la respuesta sea 200 (ok)
        $response->assertStatus(200);  
        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }
}
