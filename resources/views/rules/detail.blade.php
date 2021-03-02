@extends('layouts.app')

@section('content')
    Detail pravidla {{ $rule->name }}

    <table class="table">
        <thead>
        <tr>
            <th>Jméno</th>
            <th>Transformer</th>
            <th>Hodnota</th>
            <th>Ovlivněné přípony</th>
            <th>Aktivní</th>
            <th>editovat</th>
            <th>odstranit</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $rule->name }}</td>
                <td>{{ $rule->transformer }}</td>
                <td>{{ $rule->value }}</td>
                <td>
                @foreach ($extensions as $extension)
                <span class="badge badge-primary"> {{ $extension->name }}</span>
                @endforeach
                </td>
                <td>{{ $rule->active }}</td>
                <td>
                <a href="{{ route('rules_edit', $rule) }}" class="btn btn-primary a-btn-slide-text">
                    <span aria-hidden="true"></span>
                    <span><i class="fas fa-pencil-alt"> </i></span>    
                </a>        
                </td>
                <td>
                <form action="{{ route('rules_destroy', $rule) }}" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                @method('DELETE')
                <button  type="submit" class="btn btn-danger a-btn-slide-text">
                    <span aria-hidden="true"></span>
                    <span><i class="fas fa-trash-alt"> </i></span>            
                </button>        
                
                </td>
            </tr>
        </tbody>
    </table>
@endsection