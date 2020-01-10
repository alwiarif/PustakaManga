@extends('layouts.admin')

@section('title') List Chapter @endsection

@section('content')

    <div class="row">
        <div class="col-md-12 text-right">
            @foreach ($listChapters as $listid)
            <a href="{{ route('chapters.add-chapter', [$listid->id]) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Chapter</a>
            @endforeach
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-stripped bg-white">
                <thead>
                    <tr class="text-center">
                        <th><b>Name Chapter</b></th>
                        <th><b>Actions</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listChapters as $list)
                        @foreach ($list->chapter as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('chapters.edit', [$item->id]) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i> Edit</a>
                                    <form method="POST" class="d-inline" onsubmit="return confirm('Delete this chapter?')" action="{{ route('chapters.destroy', [$item->id]) }}">
                                        @csrf
                                        <input type="hidden" value="DELETE" name="_method">

                                        <button type="submit" value="trash" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Trash</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
