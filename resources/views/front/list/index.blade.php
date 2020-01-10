@extends('front.layouts.publiclayout')

@section('title', 'List Manga')

@section('content')
<br><br>

    <div class="container" role="main" id="content">
        <div class="row mt-1 mx-0">
            @foreach($list as $a => $collection)
                @foreach ($collection as $subcollection)
                    <div class="manga-entry col-lg-6 border-bottom pl-0 my-1">
                        <div class="rounded large_logo mr-2">
                            <a href="{{ route('manga.detail', [$subcollection->id]) }}"><img src="{{ asset('storage/' .$subcollection->cover) }}" width="150" height="200"></a>
                        </div>
                        <div class="text-truncate mb-1 d-flex flex-nowrap align-items-center">
                            <a href="{{ route('manga.detail', [$subcollection->id]) }}" class="ml-1 manga_title text-truncate">{{ $subcollection->title }}</a>
                        </div>
                        <div style="height: 210px; overflow: hidden;">
                            {{ $subcollection->description }}
                        </div>
                    </div>
                @endforeach
            @endforeach

        </div>

    </div>

@endsection
