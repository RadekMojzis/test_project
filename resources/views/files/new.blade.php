@extends('layouts.app')

@section('content')
    Nahrát nový soubor
    <form action="{{ route('files_create') }}" enctype='multipart/form-data' method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Jméno</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="například width" value="{{ old('name')}}">
            </div>
            @error('name')
                <p class="text-danger">Povinné pole.</p>
            @enderror
            <label for="formFileSm" class="col-sm-2 col-form-label">Soubor</label>
            <div class="col-sm-10">
            <input class="form-control form-control-sm" id="file" name="file" type="file" />
            </div>
            @error('file')
                <p class="text-danger">you didnt upload a file... which is the point of this whole thing...</p>
            @enderror
            
            <label for="name" class="col-sm-2 col-form-label">Kategorie</label>
            
            <div class="col-sm-10">
                <select name="categories[]" id="categories" class="selectpicker" multiple>
                    
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
                    @endforeach 
                    
                </select>
            </div>
            @if(Session::get('errors'))
                <p class="text-danger">a witty message describing why you can't use this file.</p>
            @endif
            
        </div>
              
        <button type="submit" class="btn btn-primary mb-2">Upload</button>
    </form>
    
@endsection