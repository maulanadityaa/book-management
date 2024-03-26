@extends('adminlte::page')

@section('title', 'Author')

@section('content_header')
    <h1>List Publisher</h1>
@stop

@section('content')
    <div id="tamanho" class="card-body">
        <a href="{{ route('publishers.create') }}" class="btn btn-md btn-success mb-3">ADD PUBLISHER</a>
        <div class="table-responsive">
            <table id="example1 tabelinha" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Publisher</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($publishers as $publisher)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $publisher->publisher_name }}</td>
                            <td>{{ $publisher->phone }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td>
                                <form action="{{ route('publishers.destroy', $publisher->id) }}" method="Post">
                                    <a class="btn btn-primary" href="{{ route('publishers.edit', $publisher->id) }}">Edit</a>
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
