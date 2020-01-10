@extends('layouts.admin')

@section('title') | Add Chapter @endsection

@section('content')

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('chapters.store') }}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
            @csrf

            <label for="chapter">Chapter</label><br>
            <input type="text" class="form-control {{ $errors->has('chapter') ? 'is-invalid' : '' }}" name="chapter" placeholder="Chapter 1" value="{{old('chapter')}}">
            <div class="invalid-feedback">
                {{$errors->first('chapter')}}
            </div>
            <br>

            <label for="addpage">Add Page</label>
            <input type="file" name="addpanel[]" multiple class="form-control">
            <input type="hidden" value="{{ $chapters->id }}" name="id_manga">
            <br>

            <button class="btn btn-secondary" name="save_action" value="PUBLISH">Publish</button>
        </form>
    </div>
</div>

@endsection
