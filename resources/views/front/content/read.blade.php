@extends('front/layouts/publiclayout')

@section('title', $rdManga->name)

@section('content')
<br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-4 text-left"><a href="{{ URL::to( 'chapter/' . $previous ) }}" class="{{ $previous ? '' : 'd-none' }}"> Chapter sebelumnya</a></div>
            <div class="col-md-4 offset-md-4 text-right"><a href="{{ URL::to( 'chapter/' . $next ) }}" class="{{ $next ? '' : 'd-none' }}">Chapter berikutnya</a></div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            @foreach ($rdManga->images as $read)

            <img src="{{ asset('storage/' .$read->image) }}" alt="" width="800" height="1297" style="object-fit:cover;">
            <div class="w-100"></div>

            @endforeach
        </div>
        <div class="row">
            <div class="col-md-4 text-left"><a href="{{ URL::to( 'chapter/' . $previous ) }}" class="{{ $previous ? '' : 'd-none' }}">Chapter sebelumnya</a></div>
            <div class="col-md-4 offset-md-4 text-right"><a href="{{ URL::to( 'chapter/' . $next ) }}" class="{{ $next ? '' : 'd-none' }}">Chapter berikutnya</a></div>
        </div>
    </div>

@endsection
