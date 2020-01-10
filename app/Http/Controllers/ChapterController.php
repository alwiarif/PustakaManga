<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function  __construct(){
        $this->middleware(function($request, $next){

            if(\Gate::allows('manage-chapter')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
           });
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $list_chapter = \App\Manga::with('chapter')->where('id', $id)->get();
        return view('chapter.index' , ['listChapters' => $list_chapter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $new_chapter = \App\Manga::findOrFail($id);

        return view('chapter.create' , ['chapters' => $new_chapter]);
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
            'chapter' => 'required'
        ])->validate();

        $new_chapter = new \App\Chapter;
        $new_chapter->manga_id = $request->id_manga;
        $new_chapter->name = $request->get('chapter');
        $new_chapter->slug = \Str::slug($request->get('chapter'));
        if($new_chapter->save()){
            if($request->file('addpanel')){
                for ($i=0; $i < count($request->file('addpanel')) ; $i++) {
                    $image = new Image;
                    $image->chapter_id = $new_chapter->id;
                    $cover = $request->file('addpanel')[$i];
                    $name_folder = $new_chapter->manga->title . '/'. $new_chapter->name;
                    $foto = $cover->store($name_folder, 'public');
                    $image->image = $foto;
                    if ($image->save()) {
                        continue;
                    }else{
                     $new_chapter->delete();
                     break;

                    }

                }
            }
        }

        return redirect()->route('chapters.list', [$request->id_manga] )->with('status', 'Chapter success create');

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
        $chapter = \App\Chapter::with('images')->findOrFail($id);

        return view ('chapter.edit', ['chapters' => $chapter]);
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
        $update = \App\Chapter::findOrFail($id);
        if ($request->id_images) {
            $foto = $update->images()->findOrFail($request->id_images);
            if($foto){
                if($foto->image && file_exists(storage_path('app/public/' .$update->image))){
                    \Storage::delete('public/' .$update->image);
                }
                $folder = $update->manga->title . '/'. $update->name;
                $new_image_path = $request->file('foto')->store($folder, 'public');

                $foto->image = $new_image_path;
                $foto->save();
            }
        }else{
            $update->name = $request->get('name');
            $update->save();

            return redirect()->route('chapters.edit', [$update->id])->with('status', ' Chapter success update');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $update = \App\Chapter::findOrFail($id);
        \Storage::deleteDirectory('public/'.$update->manga->title . '/'. $update->name);
        $update->images()->delete();
        $update->delete();
        return redirect()->route('chapters.list',[$update->manga->id])->with('status', 'Chapter permanent deleted!');

    }
}
