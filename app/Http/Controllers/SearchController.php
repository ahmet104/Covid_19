<?php

namespace App\Http\Controllers;


use App\Hasta;
use Carbon\Carbon;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        // dd($request->all());
        if (isset($request->age) && isset($request->nationality) && isset($request->durum)) {
            $hst = Hasta::where('age', $request->age)->where('nationality', $request->nationality)
            ->where('durum', $request->durum)->get();
            //    dd('askjdhdskhf');
        } elseif (isset($request->age) && $request->nationality == null && $request->durum == null) {

            $hst = Hasta::where('age', $request->age)->get();
        } elseif (isset($request->nationality) && $request->age == null) {

            $hst = Hasta::where('nationality', $request->nationality)->get();
        }elseif (isset($request->durum) && $request->age == null && $request->nationality == null){

            $hst = Hasta::where('durum', $request->durum)->get();
        }else {
            $hst = Hasta::all();
        }
        // $ages = Hasta::where('age', '>', '1')->get();
        // $agedizi = [];

        // $nationalitysdizi = [];
        // foreach ($hst as $age) {
        //     $agedizi[] = $age->age;
        //     $nationalitysdizi[] = $age->nationality;
        // }

        $ages = Hasta::all();
        $agedizi = [];
        $durumu=['Sag','Rahmetli'];

        $nationalitysdizi = [];
        foreach ($ages as $age) {
            $agedizi[] = $age->age;
            $nationalitysdizi[] = $age->nationality;

        }

        return view('search')->with('hastas', $hst)->with('durumu', $durumu)
        ->with('age', $agedizi)->with('nationality', $nationalitysdizi);
    }


    public function filter(Request $request)
    {
        // $time = Carbon::now()->format('H:i');
        // $mutable = Carbon::now();
        // $tt = $mutable->isoFormat('D.M.Y');
        // $now = Carbon::now();

        $hastas = Hasta::all();
        // $ttt=$hastas->created_at;
        // (json_encode(json_decode($ttt,true)));
        //  $ttt=(json_encode($ttt));
        //  dd($ttt);
        $toplam = $hastas->count();
        $vaka = $hastas->where('hastaMi', 'Pozitif')->count();

        $asi = $hastas->where('asi', 'Evet')->count();
        $asi=$asi/$toplam*100;
        //dd($asi);
        $sifa = $hastas->where('hastaMi', 'Negatif')->count();
        $kretik = $hastas->where('hastaMi', 'Pozitif')->where('comment_of_doktor', 'kretik')->count();
        $vefat = $hastas->where('durum', 'Rahmetli')->count();
        $agir = $hastas->where('comment_of_doktor', 'kretik')->where('durum', 'Sag')->count();
        //dd($agir);
        return view('analiz')->with('hastas', $hastas)->with('toplam', $toplam)
            ->with('vaka', $vaka)->with('kretik', $kretik)->with('vefat', $vefat)
            ->with('agir', $agir)->with('sifa', $sifa)->with('asi', $asi);
    }


    public function store(Request $request)
    {
        dd($request);
        return $request->all();
        return view('search');
    }
}
