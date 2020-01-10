@extends('layouts.admin')

@section('title') | Edit Manga @endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form action="{{ route('manga.update', [$mangas->id]) }}" enctype="multipart/form-data" method="POST" class="p-3 shadow-sm bg-white">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">

                    <label for="title">Title</label><br>
                    <input type="text" class="form-control" value="{{ $mangas->title }}" name="title" placeholder="Manga title"><br>

                    <label for="cover">Cover</label><br>
                    <small class="text-muted">Current cover</small><br>
                    @if ($mangas->cover)
                        <img src="{{ asset('storage/' .$mangas->cover) }}" width="96px">
                    @endif
                    <br><br>

                    <input type="file" class="form-control" name="cover">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah cover</small><br><br>

                    <label for="slug">Slug</label><br>
                    <input type="text" disabled class="form-control" value="{{ $mangas->slug }}" name="slug" placeholder="enter-a-slug">
                    <br>

                    <label for="author">Author</label>
                    <input type="text" placeholder="Author" value="{{ $mangas->author }}" id="author" name="author" class="form-control"><br>

                    <label for="description">Description</label><br>
                    <textarea name="description" id="description" class="form-control">{{ $mangas->description }}</textarea><br>

                    <label for="genres">Genres</label>
                    <select multiple class="form-control" name="genres[]" id="genres"></select><br><br>

                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option {{ $mangas->status == 'COMPLETE' ? 'selected' : '' }} value="COMPLETE">Complete</option>
                        <option {{ $mangas->status == 'ONGOING' ? 'selected' : '' }} value="ONGOING">Ongoing</option>
                    </select><br>

                    <button class="btn btn-primary" value="Update">UPDATE</button>

                </form>
            </div>
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
