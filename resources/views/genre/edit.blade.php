@extends('layouts.admin')

@section('title') | Edit Genre @endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form action="{{ route('genre.update', [$genres->id]) }}" enctype="multipart/form-data" method="POST" class="p-3 shadow-sm bg-white">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <label for="name">Genre Name</label><br>
                    <input type="text" class="form-control" value="{{ $genres->name }}" name="name" placeholder="Genre Name"><br>

                    <button class="btn btn-primary" value="Update">UPDATE</button>

                </form>
            </div>
        </div>
    </div>


@endsection
