@extends('layouts.app')

@section('content')
    Detail přípony {{ $extension->name }}

    <table class="table">
        <thead>
        <tr>
            <th>Jméno</th>
            <th>Pravidla</th>
            <th>Aktivní</th>
            <th>editovat</th>
            <th>odstranit</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $extension->name }}</td>
                <td>
                @foreach ($rules as $rule)
                <span class="badge badge-primary"> {{ $rule->name }}</span>
                @endforeach
                </td>
                <td>{{ $extension->active }}</td>
                <td>
                <a href="{{ route('extensions_edit', $extension) }}" class="btn btn-primary a-btn-slide-text">
                    <span aria-hidden="true"></span>
                    <span><i class="fas fa-pencil-alt"> </i></span>    
                </a>        
                </td>
                <td>
                <form action="{{ route('extensions_destroy', $extension) }}" method="post">
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