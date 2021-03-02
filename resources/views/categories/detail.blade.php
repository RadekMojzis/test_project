@extends('layouts.app')

@section('content')
    Detail kategorie {{ $category->name }}

    <table class="table">
        <thead>
        <tr>
            <th>Jméno</th>
            <th>povolené přípony</th>
            <th>soubory</th>
            <th>editovat</th>
            <th>odstranit</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                @foreach ($category->extensions as $extension)
                <span class="badge badge-primary"> {{ $extension->name }}</span>
                @endforeach
                </td>
                <td>
                @foreach ($category->files as $file)
                <span class="badge badge-primary"> {{ $file->name }}</span>
                @endforeach
                </td>
                <td>
                <a href="{{ route('categories_edit', $category) }}" class="btn btn-primary a-btn-slide-text">
                    <span aria-hidden="true"></span>
                    <span><i class="fas fa-pencil-alt"> </i></span>    
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
        </tbody>
    </table>
@endsection