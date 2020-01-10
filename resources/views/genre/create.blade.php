@extends('layouts.admin')

@section('title') | Add Genre @endsection

@section('content')

    <div class="row">
        <div class="col-md-12" >
            <form action="{{ route('genre.store') }}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
                @csrf

                <label for="name">Genre Name</label><br>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Genre name" value="{{old('name')}}">
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
                <br>

                <button class="btn btn-primary" type="submit" value="Save">Save</button>
            </form>
        </div>
    </div>

@endsection
