@extends('front.layouts.publiclayout')

@section('title', 'Search')

@section('content')
<br><br>

    <div class="container" role="main" id="content">
        <div class="row mt-1 mx-0">
            @foreach($searchManga as $search)
                    <div class="manga-entry col-lg-6 border-bottom pl-0 my-1">
                        <div class="rounded large_logo mr-2">
                            <a href="{{ route('manga.detail', [$search->id]) }}"><img src="{{ asset('storage/' .$search->cover) }}" width="150" height="200" style="object-fit:cover;"></a>
                        </div>
                        <div class="text-truncate mb-1 d-flex flex-nowrap align-items-center">
                            <a href="{{ route('manga.detail', [$search->id]) }}" class="ml-1 manga_title text-truncate">{{ $search->title }}</a>
                        </div>
                        <div class="text-truncate py-0 mb-1">
                            <span class="fas fa-star fa-fw "></span>
                            <small>{{ $search->rating }}</small>
                        </div>
                        <div style="height: 210px; overflow: hidden;">
                            {{ $search->description }}
                        </div>
                    </div>
            @endforeach

        </div>
        <tr>
            <td colspan="10">{{ $searchManga->appends(Request::all())->links() }}</td>
        </tr>
    </div>

@endsection
