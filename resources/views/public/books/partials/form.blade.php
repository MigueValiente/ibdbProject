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
    <input type="text" class="form-control {{ $errors->has('author')?"is-invalid":"" }}" id="author" name="author" placeholder="Introduce the book author" value="{{ isset($book)?$book->author:old('author') }}"required>
    @if( $errors->has('author'))
    <div class="invalid-feedback">
        {{ $errors->first('author') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="publisher">Publisher</label>
    <select class="form-control {{ $errors->has('publisher')?"is-invalid":"" }}" id="publisher" name="publisher">
      @foreach($publishers as $publisher)
        <option value="{{ $publisher->id }}" {{ (isset($book) && $errors->isEmpty()?"selected":$publisher->id==old('publisher')?"selected":"") }}>{{ $publisher->name }}</option>
      @endforeach
    </select>
    @if( $errors->has('publisher'))
    <div class="invalid-feedback">
        {{ $errors->first('publisher') }}
    </div>
    @endif
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
