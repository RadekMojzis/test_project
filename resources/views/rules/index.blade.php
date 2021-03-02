@extends('layouts.app')

@section('content')
    Pravidla

    @if ($rules->count())
        <table class="table">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>Transformer</th>
                <th>Hodnota</th>
                <th>Aktivní</th>
                <th>editovat</th>
                <th>detail</th>
                <th>odstranit</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($rules as $rule)
                <tr>
                    <td>{{ $rule->name }}</td>
                    <td>{{ $rule->transformer }}</td>
                    <td>{{ $rule->value }}</td>
                    <td>{{ $rule->active }}</td>
                    <td>
                    <a href="{{ route('rules_edit', $rule) }}" class="btn btn-primary a-btn-slide-text">
                        <span aria-hidden="true"></span>
                        <span><i class="fas fa-pencil-alt"> </i></span>    
                    </a>        
                    </td>
                    <td>
                    <a href="{{ route('rules_detail', $rule) }}" class="btn btn-primary a-btn-slide-text">
                        <span aria-hidden="true"></span>
                        <span><i class="fas fa-eye"> </i></span>    
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
                @endforeach
            </tbody>
        </table>
    @else
        There are no rules...
    @endif
    <a class="btn btn-primary" href="{{ route('rules_create') }}" role="button">Nové pravidlo</a>
@endsection