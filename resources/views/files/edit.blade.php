@extends('layouts.app')

@section('content')
    Editovat soubor
    <form action="{{ route('files_update', $file) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Jméno</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ $file->name }}">
            </div>
            @error('name')
                <p class="text-danger">Pole nesmí být prázdné</p>
            @enderror
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Kategorie</label>
            <div class="col-sm-10">
                <select name="categories[]" id="categories" class="selectpicker" multiple>
                    
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($file->categories->contains($category)) selected @endif >{{ $category->name }}</option>
                    @endforeach 
                    
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Potvrdit</button>
    </form>
    
@endsection