@extends('layouts.app')
@section('content')
    <form action="{{ route('searching') }}"  enctype="multipart/form-data">

        <div class="form-group">
            <div class="col-md-6">
                <select name="age" id="age" class="form-control input-lg dynamic" data-dependent="state">

                    <option value="">Age</option>
                     @foreach ($age as $ages)
                     <option>{{$ages}}</option>
                    @endforeach
                </select>
                <br>
                <select name="nationality" id="nationality" class="form-control input-lg dynamic" data-dependent="state">
                    <option value="">nationality</option>
                    @foreach ($nationality as $nationalitys)
                     <option>{{$nationalitys}}</option>
                    @endforeach
                </select>
                <br>
                <select name="durumu" id="durumu" class="form-control input-lg dynamic" data-dependent="state">

                    <option value="">Hasta Durumu</option>
                    @foreach ($durumu as $durumus)
                     <option>{{$durumus}}</option>
                    @endforeach
                    </select>
                <br>
                <select name="" id="" class="form-control input-lg dynamic" data-dependent="state">
                    <option value="">gender</option>
                    </select>
                <br>

                <input class="btn btn-primary" type="submit" name="UYGULA">
            </div>
        </div>

    </form>
    <table class="table table-striped">
        <thead>
            <th>ID </th>
            <th>Name </th>
            <th>age </th>
            <th>gender </th>
            <th> nationality </th>
            <th> comment_of_doktor </th>
            <th> Asi Durumu </th>
            <th> Hasta Durumu </th>
            <th> Hasta Sonucu </th>
            <th> craetaed_at </th>
            <th> created_by </th>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($hastas as $hasta)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $hasta->name }}</td>
                    <td>{{ $hasta->age }}</td>
                    <td>{{ $hasta->gender }}</td>
                    <td>{{ $hasta->nationality }}</td>
                    <td>{{ $hasta->comment_of_doktor }}</td>
                    <td>{{ $hasta->asi }}</td>
                    <td>{{ $hasta->durum }}</td>
                    <td>{{ $hasta->hastaMi }}</td>
                    <td>{{ $hasta->created_at }}</td>
                    <td>{{ $hasta->created_by }}</td>
                    <td>


                    </td>
                </tr>
                <?php $no++; ?>
            @endforeach
        </tbody>
    </table>

    <div>


    </div>
@endsection
