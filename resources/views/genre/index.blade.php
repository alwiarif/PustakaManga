@extends('layouts.admin')

@section('title') | Genre @endsection

@section('content')
<br>


    <div class="container">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="row">
                <div class="col-md-4">
                    <form action="{{ route('genre.index') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Nama" name="name">
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
                            <th><b>Genre Name</b></th>
                            <th><b>Actions</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                            <tr>
                                <td>{{ $genre->name }}</td>
                                <td>
                                    <a href="{{ route('genre.edit', [$genre->id]) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i> Edit</a>
                                    <form method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this genre?')" action="{{ route('genre.destroy', [$genre->id]) }}">
                                        @csrf
                                        <input type="hidden" value="DELETE" name="_method">

                                        <button type="submit" value="trash" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt"></i> Trash</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">{{ $genres->appends(Request::all())->links() }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
