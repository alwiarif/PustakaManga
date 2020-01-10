@extends('layouts.admin')

@section('title') Edit Chapter @endsection

@section('content')

    <div class="row">
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form action="{{ route('chapters.update', [$chapters->id]) }}" enctype="multipart/form-data" method="POST" class="p-3 shadow-sm bg-white">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <label for="name">Chapter Name</label><br>
            <div class="row">
                <div class="col-10">
                <input type="text" class="form-control" value="{{ $chapters->name }}" name="name" placeholder="Chapter Name"><br>

                </div>

                <div class="col-2">
                    <input type="submit" class="btn btn-block btn-lg">
                </div>
            </div>

        </form>
            @foreach ($chapters->images as $page)
            <form action="{{ route('chapters.update', [$chapters->id]) }}" enctype="multipart/form-data" method="POST" class="p-3 shadow-sm bg-white">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" class="form-control" value="{{ $chapters->name }}" name="name" placeholder="Chapter Name"><br>

                <label for="page">Page</label><br>

                <input type="hidden" value="{{ $page->id }}" name="id_images">
                @if ($page->image)
                    <img src="{{ asset('storage/' .$page->image) }}" width="96px">
                @endif
                <br><br>

                <input type="file" class="form-control" name="foto">

                <br>
                <button class="btn btn-primary" type="submit" value="update">UPDATE</button>

            </form>
            @endforeach



        </div>
    </div>

@endsection
