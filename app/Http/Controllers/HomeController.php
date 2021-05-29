<?php

namespace App\Http\Controllers;

use App\Hasta;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $hastas = Hasta::all();
        //  $age= Hasta::where('age','>','24')->where('nationality','Syrian')->get();
        // dd($age);
        return view('home', compact('hastas'));
    }
    public function page()
    {


        $hastas = Hasta::all();
       // $age= Hasta::age()->distinct()->get()->pluck('age');

         //dd($hastas);
        return view('page', compact('hastas'));
    }
    public function search(Request $request)
    {

            $search = $request->get('search');
            //dd($search);
            if ($search == "") {
                $hastas = Hasta::all();

                return view('home', compact('hastas'));
            } else {
            $hastas = Hasta::where('name', 'like', '%' . $search . '%')->orWhere('gender', 'like', '%' . $search . '%')
                ->orWhere('age', 'like', '%' . $search . '%')->orWhere('nationality', 'like', '%' . $search . '%')
                ->orWhere('comment_of_doktor', 'like', '%' . $search . '%')
                ->orWhere('durum', 'like', '%' . $search . '%')
                ->orWhere('hastaMi', 'like', '%' . $search . '%')
                ->orWhere('asi', 'like', '%' . $search . '%')->orderBy('name')->get();


            //dd (json_encode(json_decode($hastas,true)));
            return view('home')->with('hastas', $hastas);
        }
    }
}
