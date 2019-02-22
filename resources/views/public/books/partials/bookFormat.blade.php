
    <div data-list = "books">
        @forelse($books as $book)
            <div class="card mb-2" data-bookId="{{$book->id}}">
                <div class="card-header">
                    {{ $book->title }}
                </div>
                <div class="card-body">
                    <h5 class="card-title"><a href="{{route('user.index', $book->user->slug)}}" title="{{ $book->user->name}}'s book list">{{$book->user->name}}</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $book->author}}</h6>
                    <p class="card-text">{{ str_limit($book->description, 300) }}</p>
                    
                    @auth
                    {{-- <a href="/books/{{ $book->id }}/edit" class="btn btn-warning btn-sm mr-2 float-right">Edit</a> --}}
                    <form action="/books/{{ $book->id }}" method="post" id="deleteForm" data-bookId="{{$book->id}}" data-accion="delete" class="mr-2 float-right">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Delete Book</button>
                    </form>
                    @endauth
                    <a href="/books/{{ $book->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>
                    @auth
                    <a href="/books/{{ $book->id }}/edit" class="btn btn-warning btn-sm mr-2     float-right">Edit</a>
                    @endauth

            </div>
            </div>
            @empty
            <p>No hay libros</p>
        @endforelse
    </div>