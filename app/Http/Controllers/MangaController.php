<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MangaController extends Controller
{
    public function  __construct(){
        $this->middleware(function($request, $next){

            if(\Gate::allows('manage-manga')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
           });
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mangalist = \App\Manga::with('genres')->latest()->paginate(10);

        $keyword = $request->get('name');

        if ($keyword) {
            $mangalist = \App\Manga::with('genres')->where('title', "LIKE", "%$keyword%")->paginate(10);
        }
        return view('manga.index', ['mangas' => $mangalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'artist' => 'required',
            'rating' => 'required | numeric'
        ])->validate();

        $new_manga = new \App\Manga;
        $new_manga->title = $request->get('title');
        $new_manga->description = $request->get('description');
        $new_manga->author = $request->get('author');
        $new_manga->artist = $request->get('artist');
        $new_manga->status = $request->get('status');
        $new_manga->rating = $request->get('rating');
        $cover = $request->file('Cover');
        if($cover){
            $cover_path = $cover->store('book-covers', 'public');
            $new_manga->cover = $cover_path;
        }
        $new_manga->slug = \Str::slug($request->get('title'));
        $new_manga->save();
        $new_manga->genres()->attach($request->get('genres'));

        return redirect()->route('manga.index')->with('status', 'Manga success create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manga = \App\Manga::findOrFail($id);
        return view('manga.edit', ['mangas' => $manga]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $manga = \App\Manga::findOrFail($id);
        $manga->title = $request->get('title');
        $manga->description = $request->get('description');
        $manga->author = $request->get('author');
        $manga->status = $request->get('status');
        $new_cover = $request->file('cover');
        if($new_cover){
            if($manga->cover && file_exists(storage_path('app/public/' .$manga->cover))){
                \Storage::delete('public/' .$manga->cover);
            }

            $new_cover_path = $new_cover->store('book-covers', 'public');

            $manga->cover = $new_cover_path;
        }
        $manga->slug = \Str::slug($request->get('title'));
        $manga->save();

        $manga->genres()->sync($request->get('genres'));

        return redirect()->route('manga.edit', [$manga->id])->with('status', ' Manga success update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_manga = \App\Manga::findOrFail($id);
        \Storage::deleteDirectory('public/'.$delete_manga->title);
        $foto = \App\Image::whereIn('chapter_id',$delete_manga->chapter->pluck('id'))->delete();
        $delete_manga->chapter()->delete();
        $delete_manga->delete();

        return redirect()->route('manga.index')->with('status', 'Success Delete');

    }

    public function genreSearch(Request $request)
    {
        $keyword = $request->get('q');

        $genres = \App\Genre::where("name", "LIKE", "%$keyword%")->get();

        return $genres;
    }

    public function dashboard()
    {
        return view('manga.dashboard');
    }

}
