<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $manga = \App\Chapter::with('manga')->latest()->paginate(10);
        $chapter = \App\Chapter::with('manga')->orderBy('view','desc')->take(5)->get();

        return view('front.content.index', ['mangas' => $manga], ['chapters' =>$chapter]);
    }

    public function detailPage($id)
    {
        $mangaDetail = \App\Manga::with('genres')->findOrFail($id);
        return view('front.content.detail', ['mangaDetail' => $mangaDetail]);
    }

    public function readManga($id)
    {
        $rdManga = \App\Chapter::with('images')->findOrFail($id);
        $rdManga->view++;
        $rdManga->save();
        $previous = \App\Chapter::where('id', '<', $rdManga->id)->where('manga_id',$rdManga->manga_id)->max('id');
        $next = \App\Chapter::where('id', '>', $rdManga->id)->where('manga_id',$rdManga->manga_id)->min('id');

        return view('front.content.read', ['rdManga' => $rdManga])->with('previous', $previous)->with('next', $next);
    }

    public function listManga()
    {
        $list = \App\Manga::orderBy('title')->get();
        $group = $list->groupBy(function ($item, $key){
            return substr($item->title, 0, 1);
        });
        return view('front.list.index', ['list' => $group]);
    }

    public function searchManga(Request $request)
    {
        $keyword = $request->get('keyword');
        $search = \App\Manga::where("title", "LIKE", "%$keyword%")->paginate(10);
        return view('front.content.search', ['searchManga'=>$search]);
    }

    public function pageChapter($id)
    {
        $chapter = \App\Chapter::find($id);
        $previous = \App\Chapter::where('id', '<', $chapter->id)->max('id');
        $next = \App\Chapter::where('id', '>', $chapter->id)->min('id');

        return view('manga.read')->with('previous', $previous)->with('next', $next);
    }
}
