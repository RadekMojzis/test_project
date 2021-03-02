@extends('layouts.app')

@section('content')
    Editovat kategorii
    <form action="{{ route('categories_update', $category) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Jméno</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
            </div>
            @error('name')
                <p class="text-danger">Pole nesmí být prázdné</p>
            @enderror
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">přípony</label>
            <div class="col-sm-10">
                <select name="extensions[]" id="extensions" class="selectpicker" multiple>
                    
                    @foreach ($extensions as $extension)
                        <option value="{{ $extension->id }}" @if($category->extensions->contains($extension)) selected @endif >{{ $extension->name }}</option>
                    @endforeach 
                    
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Potvrdit</button>
    </form>
    
@endsection