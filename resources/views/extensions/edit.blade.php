@extends('layouts.app')

@section('content')
    Editovat příponu
    <form action="{{ route('extensions_update', $extension) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Jméno</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ $extension->name }}">
            </div>
            @error('name')
                <p class="text-danger">Pole nesmí být prázdné</p>
            @enderror
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">pravidla</label>
            <div class="col-sm-10">
                <select name="rules[]" id="rules" class="selectpicker" multiple>
                    
                    @foreach ($rules as $rule)
                        <option value="{{ $rule->id }}" @if($selected->contains($rule)) selected @endif >{{ $rule->name }}</option>
                    @endforeach 
                    
                </select>
            </div>
        </div>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" name="active" id="active" @if($extension->active) checked @endif>
            <label class="form-check-label" for="active">Aktivní</label>
        </div>
        
        <button type="submit" class="btn btn-primary mb-2">Potvrdit</button>
    </form>
    
@endsection