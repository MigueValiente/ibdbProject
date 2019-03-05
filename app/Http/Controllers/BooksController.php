<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Publisher;
use App\Author;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate;
use App\Notifications\BookCreated;

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

        $this->middleware('can:touch,book', ['only' => ['edit','update','destroy']]);
    }
    public function index()
    {
        //El with se usa para precargar los datos del libro. A esto se le llama Eager Loading, lo usado hasta ahora era el lazy loading
        $books = Book::with(['user','authors','publisher'])
                            ->latest()
                            ->paginate(10);
        
        // $condition = true;

        // if($condition){
            //El load postcarga los datos del libro dependiendo si se cumple o no la condicion
        //     $books=$books->load(['user','authors','publisher'])->latest()->paginate(10);
        // }

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
        //$cover = $request->file('cover');
        // dd($cover);
        $book = Book::create([
            'user_id' => $request->user()->id,
            'publisher_id' => $request->publisher,
            'title' => request('title'),
            'slug' => str_slug(request('title'), "-"),
            'description' => request('description'),
            //'cover' => $cover->store('covers','public'),
        ]);
        //aqui se crean las inserciones en la tabla author_book
        $book->authors()->sync(request('author'));

        $user = User::find(1);
        $user->notify(new BookCreated($book));

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
        $book = Book::with(['authors','publisher'])->where('slug', $slug)->firstOrFail();

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

        //abort_unless( auth()->user()->owns($book), 403 );

        //$this->authorize('touch', $book);

        //abort_unless(\Gate::allows('touch',$book), 403);

        if(auth()->user()->cannot('touch', $book)){
            abort(403);
        }

        
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
        $cover = $request->file('cover');

        if($cover && $book->cover){
            Storage::disk('public')->delete($book->cover);
        }
        
        $book->update([
            'title' => request('title'),
            'slug' => str_slug(request('title'), "-"),
            'publisher_id' => request('publisher'),
            'description' => request('description'),
            'cover' => ($cover?$cover->store('covers','public'):$book->cover),
        ]);

        $book->authors()->sync(request('author'));

        return redirect('/books/'.$book->slug)
            ->with('message', 'This book has been edited correctly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {

        if($book->cover){
            Storage::disk('public')->delete($book->cover);
        }

        // if(auth()->user()->cannot('touch', $book)){
        //     abort(403);
        // }
        
        $book->authors()->detach();
        $book->delete();

        return redirect('/books')
            ->with('message', 'The book '.$book->title. ' has been deleted.');
    }
}
