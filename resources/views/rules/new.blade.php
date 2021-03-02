@extends('layouts.app')

@section('content')
    Nové pravidlo
    <form action="{{ route('rules_create') }}" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Jméno</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="například width" value="{{ old('name')}}">
            </div>
            @error('name')
                <p class="text-danger">Povinné pole.</p>
            @enderror
        </div>
        <div class="form-group row">
            <label for="value" class="col-sm-2 col-form-label">Hodnota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="value" id="value" placeholder="například 100" value="{{ old('value')}}">
            </div>
            @error('value')
                <p class="text-danger">Povinné pole.</p>
            @enderror
        </div>
        <div class="form-group row">
            <label for="transformer" class="col-sm-2 col-form-label">Transformer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="transformer" id="transformer" placeholder="width" value="{{ old('transformer')}}">
            </div>
            @error('transformer')
                <p class="text-danger">Povinné pole.</p>
            @enderror
        </div>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" name="active" id="active" checked>
            <label class="form-check-label" for="active">Aktivní</label>
        </div>
        
        <button type="submit" class="btn btn-primary mb-2">Vytvořit</button>
    </form>
    
@endsection