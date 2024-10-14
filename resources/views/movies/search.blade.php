@extends('layout')

@section('content')
    <div class="table-responsive">
        {{-- <a href="{{ route('movies.create') }}" class="btn btn-primary">Create</a> --}}
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Intro</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Genre name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $movie)
                    <tr class="">

                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                       
                        
                        <td>
                            @if ($movie->poster)
                                <img src="{{ Storage::url($movie->poster) }}" alt="" width="100px">
                            @endif
                        </td>
                        <td>{{ $movie->intro }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>
                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-info">SHOW</a>
                            <a href="{{ route('movies.edit', $movie) }}" class="btn btn-danger">EDIT</a>
                            <form action="{{ route('movies.destroy', $movie) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning"
                                    onclick="return confirm('ARE YOU SURE?')">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
         <a href="{{ route('movies.index') }}" class="btn btn-primary">HOME</a>

        {{ $data->links() }}
    </div>
@endsection
