@extends('front/layouts/publiclayout')

@section('title', $mangaDetail->title)

@section('content')
<br><br>
    <div class="container" role="main" id="content">
        <div class="card mb-3">
            {{-- header manga --}}
            <h6 class="card-header d-flex align-items-center py-2">
                <span class="fas fa-book fa-fw "></span>
                <span class="mx-1">{{ $mangaDetail->title }}</span>
            </h6>
            <div class="card-body p-0">
                <div class="row edit">
                    {{-- Image --}}
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        <a href="#">
                            <img src="{{ asset('storage/' .$mangaDetail->cover) }}" alt="" width="250.33" height="207.83" style="object-fit:cover;">
                        </a>
                        &nbsp;
                    </div>
                    {{-- Content --}}
                    <div class="col-xl-9 col-lg-8 col-md-7-push-2">

                        <div class="row m-0 py-1 px-0 border-top">
                            <div class="col-lg-3 col-xl-2 strong">Author:</div>
                            <div class="col-lg-9 col-xl-10">{{ $mangaDetail->author }}</div>
                        </div>
                        <div class="row m-0 py-1 px-0 border-top">
                            <div class="col-lg-3 col-xl-2 strong">Artist:</div>
                            <div class="col-lg-9 col-xl-10">{{ $mangaDetail->artist }}</div>
                        </div>
                        <div class="row m-0 py-1 px-0 border-top">
                            <div class="col-lg-3 col-xl-2 strong">Genre:</div>
                            <div class="col-lg-9 col-xl-10">
                                @foreach ($mangaDetail->genres as $genre)
                                    <a class="badge badge-secondary" href="#">{{ $genre->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="row m-0 py-1 px-0 border-top">
                            <div class="col-lg-3 col-xl-2 strong">Rating</div>
                            <div class="col-lg-9 col-xl-10"> <span class="fas fa-star fa-fw "></span> {{ $mangaDetail->rating }}</div>
                        </div>
                        <div class="row m-0 py-1 px-0 border-top">
                            <div class="col-lg-3 col-xl-2 strong">Status komik</div>
                            <div class="col-lg-9 col-xl-10">{{ $mangaDetail->status }}</div>
                        </div>
                        <div class="row m-0 py-1 px-0 border-top">
                            <div class="col-lg-3 col-xl-2 strong">Description:</div>
                            <div class="col-lg-9 col-xl-10">{{ $mangaDetail->description }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="edit tab-content">
            {{-- header chapter --}}
            <div class="chapter-container ">
                <div class="row no-gutters">
                    <div class="col">
                        <div class="chapter-row d-flex row no-gutters p-2 align-items-center border-bottom odd-row">
                            <div class="col-auto text-center order-lg-4">Daftar Chapter</div>
                        </div>
                    </div>
                </div><br>
                {{-- chapter list --}}
                <div class="row no-gutters">
                    <div class="col">
                        @foreach ($mangaDetail->chapter as $chapters)
                        <div class="chapter-row d-flex row no-gutters p-2 align-items-center border-bottom odd-row">
                            <a href="{{ route('manga.read', [$chapters->id]) }}"><span>{{$chapters->name}}</span></a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
