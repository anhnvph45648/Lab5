@extends('layout')

@section('content')
    <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
        @csrf
       
        <div class="mb-3">
            <label for="">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Poster</label>
            <input type="file" name="poster" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Intro</label>
            <input type="text" name="intro" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Release Date</label>
            <input type="date" name="release_date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="">Genre name</label>
            <select name="genre_id" class="form-select">
                @foreach ($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
               
            </select>
        </div>
        
        <button type="submit" class="btn btn-info">SAVE</button>
    </form>
    <a href="{{ route('movies.index') }}" class="btn btn-primary">HOME</a>
@endsection
