@extends('layouts.app')

@section('content')
    Nová přípona
    <form action="{{ route('extensions_create') }}" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Jméno</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="například width" value="{{ old('name')}}">
            </div>
            @error('name')
                <p class="text-danger">Povinné pole.</p>
            @enderror
            <label for="name" class="col-sm-2 col-form-label">pravidla</label>
            <div class="col-sm-10">
                <select name="rules[]" id="rules" class="selectpicker" multiple>
                    
                    @foreach ($rules as $rule)
                        <option value="{{ $rule->id }}" >{{ $rule->name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-check">
            <input type="checkbox" class="form-check-input" name="active" id="active" checked>
                <label class="form-check-label" for="active">Aktivní</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Vytvořit</button>
    </form>
    
@endsection