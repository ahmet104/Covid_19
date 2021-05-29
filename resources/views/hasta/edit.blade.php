@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Hasta Form</div>
                <div class="card-body">
                    @dd($data);
                    <form action="{{ route('hasta.save') }}" method="hasta">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="usr">Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label for="comment">age:</label>
                        <textarea class="form-control" rows="1" name="age"></textarea>
                    </div>

                    <div class="form-group">

                        <label for="sel1">Select Gender:</label>
                        <select class="form-control" id="sel1" name="gender">
                            <option>Erkek</option>
                            <option>Kadin</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">nationality:</label>
                        <textarea class="form-control" rows="1" name="nationality"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="comment">comment_of_doktor:</label>
                        <textarea class="form-control" rows="1" name="comment_of_doktor"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Asi Durumu:</label>
                        <select class="form-control" id="sel1" name="asi">
                            <option>Evet</option>
                            <option>Hayir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Hasta Durumu:</label>
                        <select class="form-control" id="sel1" name="durum">
                            <option>Sag</option>
                            <option>Rahmetli</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sel2">Tahlil Sonucu:</label>
                        <select class="form-control" id="sel2" name="hastaMi">
                            <option>Pozitif</option>
                            <option>Negatif</option>
                        </select>
                    </div>
                    <p align="center"><button class="btn btn-primary">Update</button></p>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
