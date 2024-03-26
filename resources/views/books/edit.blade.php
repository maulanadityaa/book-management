@extends('layouts.app')


@section('title', 'Edit Book')

@section('content_header')
    <h1>Edit Book</h1>
@stop

@section('content_body')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" value="{{ old('title', $book->title) }}" placeholder="Input book title">

                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">AUTHOR</label>
                                <select class="custom-select" aria-label="Default select example" name="author_id">
                                    <option selected>Open this select menu</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">
                                            {{ $author->author_name }}</option>
                                    @endforeach
                                </select>

                                @error('author')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">YEAR</label>
                                <input type="text" class="form-control @error('year') is-invalid @enderror"
                                    name="year" value="{{ old('year', $book->year) }}"
                                    placeholder="Input book publish year">

                                @error('year')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">PUBLISHER</label>
                                <select class="custom-select" aria-label="Default select example" name="publisher_id">
                                    <option selected>Open this select menu</option>
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">
                                            {{ $publisher->publisher_name }}</option>
                                    @endforeach
                                </select>

                                @error('publisher')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">ISBN</label>
                                <input type="text" class="form-control @error('isbn') is-invalid @enderror"
                                    name="isbn" value="{{ old('isbn', $book->isbn) }}" placeholder="Input book isbn">

                                @error('isbn')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
