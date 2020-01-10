@extends('front/layouts/publiclayout')

@section('title', 'Beranda')

@section('content')
<br><br>
    <div class="container" role="main" id="content">
        <div class="row">
            {{-- Current Update --}}
            <div class="col-md-8">
                <div class="card mb-3">
                    <h6 class="card-header text-center">Current Update</h6>
                </div>
                <div class="tab-content">
                    <div class="row m-0">
                        @foreach ($mangas as $chapup)

                        <div class="col-md-6 border-bottom p-2">
                            <div class="hover sm_md_logo rounded float-left mr-2">
                                <a href="{{ route('manga.detail', [$chapup->manga->id]) }}">
                                <img class="rounded max-width" src="{{ asset('storage/' .$chapup->manga->cover) }}" width="80" height="106">
                                </a>
                            </div>
                            <div class="pt-0 pb-1 mb-1 border-bottom d-flex align-items-center flex-nowrap">
                                <span class="fas fa-book fa-fw mr-1"></span>
                                <a href="{{ route('manga.detail', [$chapup->manga->id]) }}">{{ $chapup->manga->title }}</a>
                            </div>

                            <div class="text-truncate py-0 mb-1">
                                <span class="fas fa-star fa-fw "></span>
                                <small>{{ $chapup->manga->rating }}</small>
                            </div>

                            <div class="py-0 mb-1 row no-gutters align-items-center flex-nowrap">
                                <span class="far fa-file fa-fw col-auto mr-1"></span>
                                <a href="{{ route('manga.read', [$chapup->id]) }}">{{ $chapup->name }}</a>
                            </div>
                            <div class="text-truncate py-0 mb-1">
                                <span class="far fa-clock fa-fw "></span>
                                <small>{{ $chapup->diffMinutes() }}</small>
                            </div>


                        </div>

                        @endforeach
                    </div>
                </div>
                <tr>
                    <td colspan="10">{{ $mangas->appends(Request::all())->links() }}</td>
                </tr>
            </div>
            {{-- Top Chapters --}}
            <div class="col-md-4">
                <div class="card mb-3">
                    <h6 class="card-header text-center">Top Chapters</h6>
                    <div class="tab-content">
                        <ul class="list-group list-group-flush">
                            @foreach ($chapters as $chapter)
                                <li class="list-group-item px-2 py-1">
                                    <div class="hover tiny_logo rounded float-left mr-2">
                                        <a href="{{ route('manga.detail', [$chapter->manga->id]) }}"><img class="rounded max-width" src="{{ asset('storage/' .$chapter->manga->cover) }}" alt="" width="40" height="56"></a>
                                    </div>
                                    <div class="text-truncate pt-0 pb-1 mb-1 border-bottom">
                                        <span class="fas fa-book fa-fw mr-1"></span>
                                        <a href="{{ route('manga.detail', [$chapter->manga->id]) }}">{{$chapter->manga->title}}</a>
                                    </div>
                                    <p class="text-truncate py-0 mb-1">
                                        <span class="float-left">
                                            <span class="far fa-file fa-fw "></span>
                                            <a href="{{ route('manga.read', [$chapter->id]) }}">{{ $chapter->name }}</a>
                                        </span>
                                        <span class="float-right">
                                            <span class="fas fa-eye fa-fw "></span>
                                            {{ $chapter->view }}
                                        </span>
                                    </p>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
