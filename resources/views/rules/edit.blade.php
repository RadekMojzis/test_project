@extends('layouts.app')

@section('content')
    Editovat pravidlo
    <form action="{{ route('rules_update', $rule) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Jméno</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" value="{{ $rule->name }}">
            </div>
            @error('name')
                <p class="text-danger">Pole nesmí být prázdné</p>
            @enderror
        </div>
        <div class="form-group row">
            <label for="value" class="col-sm-2 col-form-label">Hodnota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="value" id="value" value="{{ $rule->value }}">
            </div>
            @error('value')
                <p class="text-danger">Pole nesmí být prázdné</p>
            @enderror
        </div>
        <div class="form-group row">
            <label for="transformer" class="col-sm-2 col-form-label">Transformer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="transformer" id="transformer" value="{{ $rule->transformer }}">
            </div>
            @error('transformer')
                <p class="text-danger">Pole nesmí být prázdné</p>
            @enderror
        </div>
        <div class="form-check">
        <input type="checkbox" class="form-check-input" name="active" id="active" @if($rule->active) checked @endif>
            <label class="form-check-label" for="active">Aktivní</label>
        </div>
        
        <button type="submit" class="btn btn-primary mb-2">Potvrdit</button>
    </form>
    
@endsection