<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control {{ $errors->has('name')?"is-invalid":"" }}" id="name" name="name" placeholder="Introduce the publisher name" value="{{ isset(publisher)?publisher->name:old('name') }}" required>
    @if( $errors->has('name'))
    <div class="invalid-feedback">
        {{ $errors->first('name') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control {{ $errors->has('address')?"is-invalid":"" }}" id="address" name="address" placeholder="Introduce the book address" value="{{ isset(publisher)?publisher->address:old('address') }}"required>
    @if( $errors->has('address'))
    <div class="invalid-feedback">
        {{ $errors->first('address') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="email">Web</label>
    <textarea class="form-control {{ $errors->has('web')?"is-invalid":"" }}" id="web" name="web" rows="10" placeholder="Book Description" required>{{ isset(publisher)?publisher->web:old('web') }}</textarea>
    @if( $errors->has('web'))
    <div class="invalid-feedback">
        {{ $errors->first('web') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="email">Email</label>
    <textarea class="form-control {{ $errors->has('email')?"is-invalid":"" }}" id="email" name="email" rows="10" placeholder="Book Description" required>{{ isset(publisher)?publisher->email:old('email') }}</textarea>
    @if( $errors->has('email'))
    <div class="invalid-feedback">
        {{ $errors->first('email') }}
    </div>
    @endif
</div>
