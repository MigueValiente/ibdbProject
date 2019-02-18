<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control {{ $errors->has('title')?"is-invalid":"" }}" id="title" name="title" placeholder="Introduce the book title" value="{{ isset($book)?$book->title:old('title') }}" required>
    @if( $errors->has('title'))
    <div class="invalid-feedback">
        {{ $errors->first('title') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="author">Author</label>
    <select multiple class="form-control {{ $errors->has('author')?"is-invalid":"" }}" id="author" name="author[]">
      @foreach($authors as $author)
        <option value="{{ $author->id }}"
          @if(!$errors->isEmpty())
            {{in_array($author->id,old('author') ?? [])?" selected":""}}
          @elseif (isset($book))
            {{$book->authors->contains($author->id)?" selected":""}}
          @endif
        >{{ $author->name }}</option>
      @endforeach
    </select>
    @if( $errors->has('author'))
    <div class="invalid-feedback">
        {{ $errors->first('author') }}
    </div>
    @endif
  </div>
{{-- <div class="form-group">
    <label for="author">Author</label>
    <input type="text" class="form-control {{ $errors->has('author')?"is-invalid":"" }}" id="author" name="author" placeholder="Introduce the book author" value="{{ isset($book)?$book->author:old('author') }}"required>
    @if( $errors->has('author'))
    <div class="invalid-feedback">
        {{ $errors->first('author') }}
    </div>
    @endif
</div> --}}
<div class="form-group">
  <div class="row d-flex align-items-end">
    <div class="col-10">
      <label for="publisher">Publisher</label>
      <select class="form-control {{ $errors->has('publisher')?"is-invalid":"" }}" id="publisher" name="publisher">
        @foreach($publishers as $publisher)
          <option value="{{ $publisher->id }}"
            @if(!$errors->isEmpty())
              {{old('publisher') == $publisher->id?" selected":""}}
            @elseif (isset($book))
              {{$publisher->id == $book->publisher_id?" selected":""}}
            @endif
          >{{ $publisher->name }}</option>
        @endforeach
      </select>
      @if( $errors->has('publisher'))
      <div class="invalid-feedback">
          {{ $errors->first('publisher') }}
      </div>
      @endif
    </div>
    <div class="col-2">
        <a class="btn btn-primary" href="{{ route('publishers.create') }}" target="_blank">New Publisher</a>
    </div>
  </div>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control {{ $errors->has('description')?"is-invalid":"" }}" id="description" name="description" rows="10" placeholder="Book Description" required>{{ isset($book)?$book->description:old('description') }}</textarea>
    @if( $errors->has('description'))
    <div class="invalid-feedback">
        {{ $errors->first('description') }}
    </div>
    @endif
</div>
