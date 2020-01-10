<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function  __construct(){
        $this->middleware(function($request, $next){

            if(\Gate::allows('dashboard')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
           });
        }

    public function index()
    {
        $mangacount = \App\Manga::all();
        $chaptercount = \App\Chapter::all();
        return view('dashboard.index' , ['mangacount' =>$mangacount, 'chaptercount' => $chaptercount]);
    }
}
