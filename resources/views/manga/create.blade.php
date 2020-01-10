@extends('layouts.admin')

@section('title') | Add Manga @endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="row">
        <div class="col-md-12" >
            <form action="{{ route('manga.store') }}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
                @csrf

                <label for="title">Title</label><br>
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }} " name="title" placeholder="Manga title" value="{{old('title')}}">
                <div class="invalid-feedback">
                    {{$errors->first('title')}}
                </div>
                <br>

                <label for="cover">Cover</label>
                <input type="file" class="form-control" name="Cover">
                <br>

                <label for="author">Author</label><br>
                <input type="text" class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author" id="author" placeholder="Author" value="{{old('author')}}">
                <div class="invalid-feedback">
                    {{$errors->first('author')}}
                </div>
                <br>

                <label for="artist">Artist</label><br>
                <input type="text" class="form-control {{ $errors->has('artist') ? 'is-invalid' : '' }}" name="artist" id="artist" placeholder="Artist" value="{{old('artist')}}">
                <div class="invalid-feedback">
                    {{$errors->first('artist')}}
                </div>
                <br>

                <label for="description">Description</label><br>
                <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Give description in here" value="{{old('author')}}"></textarea>
                <div class="invalid-feedback">
                    {{$errors->first('description')}}
                </div>
                <br>

                <label for="genres">Genre</label><br>
                <select name="genres[]" multiple id="genres" class="form-control"></select><br><br>

                <label for="rating">Rating</label><br>
                <input type="text" name="rating" id="rating" class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}" placeholder="rating" value="{{old('rating')}}">
                <div class="invalid-feedback">
                    {{$errors->first('rating')}}
                </div>
                <br>

                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option {{ "COMPLETE" ? "selected" : "" }} value="COMPLETE">Complete</option>
                    <option {{ "ONGOING" ? "selected" : "" }} value="ONGOING">Ongoing</option>
                </select><br>

                <button class="btn btn-secondary" name="save_action" value="PUBLISH">Publish</button>
            </form>
        </div>
    </div>

@endsection

@section('footer-scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>$('#genres').select2({
        ajax: {
            url: 'http://127.0.0.1:8000/ajax/genres/search', processResults: function(data){
                return {
                    results: data.map(function(item){ return {id: item.id, text: item.name} })
                }
            }
        }
    });</script>

@endsection
