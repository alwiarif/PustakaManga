@extends('layouts.admin')

@section('title') | Manga @endsection

@section('content')
<br>


    <div class="container">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="row">
                <div class="col-md-4">
                    <form action="{{ route('manga.index') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Judul" name="name">
                            <div class="input-group-append">
                                <input type="submit" value="cari" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-stripped bg-white">
                    <thead>
                        <tr>
                            <th><b>Cover</b></th>
                            <th><b>Title</b></th>
                            <th><b>Author</b></th>
                            <th><b>Description</b></th>
                            <th><b>Status</b></th>
                            <th><b>Total chapter</b></th>
                            <th><b>Genres</b></th>
                            <th><b>Action</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mangas as $manga)
                            <tr>
                                <td>
                                    @if ($manga->cover)
                                        <img src="{{ asset('storage/' .$manga->cover) }}" width="96px">
                                    @endif
                                    <td>{{ $manga->title }}</td>
                                    <td>{{ $manga->author }}</td>
                                    <td>{{ $manga->description }}</td>
                                    <td>
                                        @if ($manga->status == "ONGOING")
                                            <span class="badge bg-dark text-white"> {{ $manga->status }}</span>
                                            @else
                                                <span class="badge badge-success"> {{ $manga->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $manga->chapter()->count() }}</td>
                                    <td>
                                        <ul class="pl-3">
                                            @foreach ($manga->genres as $genre)
                                            <li>{{ $genre->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                    <a href="{{ route('chapters.list', [$manga->id]) }}" class="btn btn-secondary btn-sm"><i class="far fa-file"></i> Chapter</a>
                                    <a href="{{ route('manga.edit', [$manga->id]) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i> Edit</a><br><br>
                                    <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this manga?')" action="{{ route('manga.destroy', [$manga->id]) }}">
                                        @csrf
                                        <input type="hidden" value="DELETE" name="_method">

                                        <button type="submit" value="trash" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt"></i> Trash</button>
                                        </form>
                                    </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{{ $mangas->appends(Request::all())->links() }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
