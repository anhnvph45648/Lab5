@extends('layout')

@section('content')
    <form action="{{ route('movies.update', $movie) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $movie->title }}">
        </div>
        <div class="mb-3">
            <label for="">Poster</label><br>
            <img src="{{ Storage::url($movie->poster) }}" alt=""  width="100">
           
            <input type="file" name="poster" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Intro</label>
            <input type="text" name="intro" class="form-control" value="{{ $movie->intro }}">
        </div>
        <div class="mb-3">
            <label for="">Release Date</label>
            <input type="date" name="release_date" class="form-control" value="{{ $movie->release_date }}">
        </div>

        <div class="mb-3">
            <label for="">Genre name</label>
            <select name="genre_id" class="form-select">
                @foreach ($genres as $genre)
                    <option
                        @selected($movie->genre_id == $genre->id)
                    value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-info">SAVE</button>
    </form>
    <a href="{{ route('movies.index') }}" class="btn btn-primary">HOME</a>
@endsection
