<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Requests\BookRequestAjax;
use App\Publisher;
use App\Author;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth',['only' => ['create','store','edit','update','destroy']
    ]);
    }
    public function index()
    {
        $books = Book::paginate(10);

        return view('public.books.index')->withBooks($books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('public.books.create', ['publishers' => $publishers, 'authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {

        $book = Book::create([
            'user_id' => $request->user()->id,
            'publisher_id' => $request->publisher,
            'title' => request('title'),
            'slug' => str_slug(request('title'), "-"),
            'description' => request('description')
        ]);
        //aqui se crean las inserciones en la tabla author_book
        $book->authors()->sync(request('author'));

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();

        return view('public.books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('public.books.edit', ['book' => $book,'publishers' => $publishers,'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update([
            'title' => request('title'),
            'slug' => str_slug(request('title'), "-"),
            'publisher_id' => request('publisher'),
            'description' => request('description')
        ]);

        $book->authors()->sync(request('author'));

        return redirect('/books/'.$book->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->authors()->detach();
        $book->delete();

        return redirect('/');
    }

    public function crearLibroAjax(BookRequestAjax $request){

      $book = Book::create([
            'user_id' => $request->user()->id,
            'publisher_id' => $request->publisher,
            'title' => request('title'),
            'slug' => str_slug(request('title'), "-"),
            'description' => request('description'),
            'user_id' => $request->user()->id //el id del usuario que esta logueado
        ]);


        return view("public.books.partials.bookData",['book' => $book]);
    }

    public function nuevoFormulario(){
        $publishers = Publisher::all();
        return view('public.books.partials.form', ['publishers' => $publishers]);
    }

    public function deleteAjax($id){
        $book = Book::where("id",$id)->firstOrFail();

        $book->delete();
        return $book->title;
    }

    public function buscar(){
            $books = Book::join('author_book','id','=','book_id')->join('authors','author_book.author_id','author_book.author_id')->where('title','like',"%".request('inputBuscador')."%")->orWhere('authors.name','like',"%".request('inputBuscador')."%")->get();

        return view('public.books.partials.bookFormat', ['books' => $books]);
    }
}
