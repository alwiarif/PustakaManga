<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function  __construct(){
        $this->middleware(function($request, $next){

            if(\Gate::allows('manage-genre')) return $next($request);
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
        $genres = \App\Genre::latest()->paginate(10);
        $filterkey = $request->get('name');
        if ($filterkey) {
            $genres = \App\Genre::where('name', "LIKE", "%$filterkey%")->paginate(10);
        }
        return view('genre.index', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.create');
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
            'name' => 'required'
        ])->validate();

        $new_genre = new \App\Genre;
        $new_genre->name = $request->get('name');
        $new_genre->save();

        return redirect()->route('genre.index')->with('status', 'Genre successfully published');
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
        $genre_edit = \App\Genre::findOrFail($id);
        return view('genre.edit', ['genres' => $genre_edit]);
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
        $name = $request->get('name');
        $genre_update = \App\Genre::findOrFail($id);
        $genre_update->name = $name;
        $genre_update->save();

        return redirect()->route('genre.edit', [$genre_update->id])->with('status', ' Genre success update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre_delete = \App\Genre::findOrFail($id);
        $genre_delete->delete();
        return redirect()->route('genre.index')->with('status', 'Success Delete');

    }
}
