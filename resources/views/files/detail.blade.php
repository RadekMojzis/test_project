@extends('layouts.app')

@section('content')
    Detail souboru {{ $file->name }}
    <table class="table">
        <thead>
        <tr>
            <th>Jméno</th>
            <th>link</th>
            <th>velikost</th>
            <th>kategorie</th>
            <th>vytvořeno</th>
            <th>editováno</th>
            <th>editovat</th>
            <th>odstranit</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $file->name }}</td>
                <td><a href="{{ route('files_download', $file) }}">{{ $file->link }}<a></td>
                <td>{{ $file->size }}</td>
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
                <form action="{{ route('files_destroy', $file) }}" method="post">
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