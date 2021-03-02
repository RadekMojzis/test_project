@extends('layouts.app')

@section('content')
    Soubory
    <br>

    @if ($files->count())
        <table class="table">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>velikost</th>
                <th>link</th>
                <th>kategorie</th>
                <th>vytvořeno</th>
                <th>editováno</th>
                <th>editovat</th>
                <th>detail</th>
                <th>odstranit</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($files as $file)
                <tr>
                    <td>{{ $file->name }}</td>
                    <td>{{ $file->size }}</td>
                    <td><a href="{{ route('files_download', $file) }}">{{ $file->link }}<a></td>
                    
                    <td>
                    @foreach ($file->categories as $category)
                    <span class="badge badge-primary"> {{ $category->name }}</span>
                    @endforeach
                    </td>
                    <td>{{ $file->created_at }}</td>
                    <td>{{ $file->updated_at }}</td>
                    <td>
                    <a href="{{ route('files_edit', $file) }}" class="btn btn-primary a-btn-slide-text">
                        <span aria-hidden="true"></span>
                        <span><i class="fas fa-pencil-alt"> </i></span>    
                    </a>        
                    </td>
                    <td>
                    <a href="{{ route('files_detail', $file) }}" class="btn btn-primary a-btn-slide-text">
                        <span aria-hidden="true"></span>
                        <span><i class="fas fa-eye"> </i></span>    
                    </a>        
                    </td>
                    <td>
                    <form action="{{ route('files_destroy', $file) }}" method="post">
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
    <a class="btn btn-primary" href="{{ route('files_create') }}" role="button">Nový soubor</a>
@endsection