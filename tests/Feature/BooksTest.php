<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use App\Book;


class BooksTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @test
     */
    public function check_if_book_list_loads()
    {
        $response = $this->get('/books');

        $response->assertOk();

        $response->assertSeeText('More Info');
    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function check_if_book_info_loads()
    {
        //Crear un libro
        $book = factory('App\Book')->create();
        //Comprobar la url del libro
        $response = $this->get('/books/'.$book->slug);

        $response->assertSee($book->title);
        //Publisher
        $response->assertSee($book->publisher->name);
        //Author/Authors
        $response->assertSee($book->authors->pluck('name')->implode(', '));
        $response->assertSee($book->description);
    }

        /**
     * A basic test example.
     *
     * @test
     */
    public function check_if_book_info_that_exist_loads()
    {
        //Coger un libro de la base de datos

        $book = Book::inRandomOrder()->first();
        //Comprobar la url del libro
        $response = $this->get('/books/'.$book->slug);

        $response->assertSee($book->title);
        //Publisher
        $response->assertSee($book->publisher->name);
        //Author/Authors
        $response->assertSee($book->authors->pluck('name')->implode(', '));
        $response->assertSee($book->description);
    }

       /**
     * A basic test example.
     *
     * @test
     */
    public function check_if_a_guest_user_creates_a_book()
    {
        $response = $this->get('/books/create');

        $response->assertRedirect('/login');

    }

        /**
     * A basic test example.
     *
     * @test
     */
    public function check_if_a_logged_user_creates_a_book()
    {
        $this->actingAs(factory('App\User')->create());

        $this->get('/books/create')
                    ->assertOk()
                    ->assertSee('Add New Book');
    }

          /**
     * A basic test example.
     *
     * @test
     */
    public function check_if_a_logged_user_save_a_book()
    {
        $this->actingAs(factory('App\User')->create());
        $book = factory('App\Book')->create();

        $this->post('/books', $book->toArray());

        $this->assertDatabaseHas('books', [
            'title' => $book->title,
            'slug' => $book->slug,
            'description' => $book->description,
        ]);
    }
}
