@extends('layouts.app')

@section('content')
    Kategorie
    <br>

    @if ($categories->count())
        <table class="table">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>editovat</th>
                <th>detail</th>
                <th>odstranit</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                    <a href="{{ route('categories_edit', $category) }}" class="btn btn-primary a-btn-slide-text">
                        <span aria-hidden="true"></span>
                        <span><i class="fas fa-pencil-alt"> </i></span>    
                    </a>        
                    </td>
                    <td>
                    <a href="{{ route('categories_detail', $category) }}" class="btn btn-primary a-btn-slide-text">
                        <span aria-hidden="true"></span>
                        <span><i class="fas fa-eye"> </i></span>    
                    </a>        
                    </td>
                    <td>
                    <form action="{{ route('categories_destroy', $category) }}" method="post">
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
        Zatím neexistuje žádná kategorie...
        <br>
    @endif
    <a class="btn btn-primary" href="{{ route('categories_create') }}" role="button">Nová kategorie</a>
@endsection