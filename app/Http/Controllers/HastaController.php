<?php

namespace App\Http\Controllers;

use App\Hasta;
use Illuminate\Http\Request;


class HastaController extends Controller
{

    //
    public function create()
    {
        // dd('hhhhh');

        return view('hasta.create');
    }

    public function edit($_id)
    {
        // dd('hhhhh');
        $data = Hasta::findOrFail($_id);

        return view('hasta.form', compact('data'));
    }
    public function save(Request $request)
    {

        $data = new Hasta($request->all());
        $data->created_by = \auth::user()->name;

        $keys = $request->key;
        $values = $request->value;

        if($request->key != null){
            foreach($keys as $key){
                $index = array_search($key, $keys);

                $data->$key = $values[$index];

            }
        }
        $data->save();

        if ($data) {
            return redirect()->route('home');
        } else {
            return back();
        }
    }


    public function update(Request $request, $_id)
    {
        $data = Hasta::findOrFail($_id);
        $data->name = $request->name;
        $data->age = $request->age;
        $data->gender = $request->gender;
        $data->nationality = $request->nationality;
        $data->comment_of_doktor = $request->comment_of_doktor;
        $data->asi = $request->asi;
        $data->durum = $request->durum;
        $data->hastaMi = $request->hastaMi;
        $data->save();

        if ($data) {
            return redirect()->route('home');
        } else {
            return back();
        }
    }
    public function delete($_id)
    {
        $data = Hasta::destroy($_id);
        if ($data) {
            return redirect()->route('home');
        } else {
            dd('Error');
        }

    }
}
