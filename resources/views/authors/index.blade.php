@extends('adminlte::page')

@section('title', 'Author')

@section('content_header')
    <h1>List Author</h1>
@stop

@section('content')
    <div id="tamanho" class="card-body">
        <a href="{{ route('authors.create') }}" class="btn btn-md btn-success mb-3">ADD AUTHOR</a>
        <div class="table-responsive">
            <table id="example1 tabelinha" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Author</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($authors as $author)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $author->author_name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->phone }}</td>
                            <td>
                                <form action="{{ route('authors.destroy', $author->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('authors.edit', $author->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                </form>
                            </td>
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
