@extends('layouts.app')

@section('content')
    Pravidla

    @if ($extensions->count())
        <table class="table">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>Aktivní</th>
                <th>editovat</th>
                <th>detail</th>
                <th>odstranit</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($extensions as $extension)
                <tr>
                    <td>{{ $extension->name }}</td>
                    <td>{{ $extension->active }}</td>
                    <td>
                    <a href="{{ route('extensions_edit', $extension) }}" class="btn btn-primary a-btn-slide-text">
                        <span aria-hidden="true"></span>
                        <span><i class="fas fa-pencil-alt"> </i></span>    
                    </a>        
                    </td>
                    <td>
                    <a href="{{ route('extensions_detail', $extension) }}" class="btn btn-primary a-btn-slide-text">
                        <span aria-hidden="true"></span>
                        <span><i class="fas fa-eye"> </i></span>    
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
                @endforeach
            </tbody>
        </table>
    @else
        Zatím nejsou žádné přípony...
    @endif
    <a class="btn btn-primary" href="{{ route('extensions_create') }}" role="button">Nová přípona</a>
@endsection