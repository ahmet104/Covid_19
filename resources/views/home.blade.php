@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Hasta List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-md-4">
                            <form action="/search" method="get">
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control">
                                    <span class="input-group-prepend">
                                        <button type="submit" class="btn btn-primary"> Search</button>
                                    </span>
                                </div>

                            </form>
                        </div>


                        <table class="table table-striped">
                            <thead>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Age </th>
                                <th> Gender </th>
                                <th> Nationality </th>
                                <th> Comment_of_doktor </th>
                                <th> Asi Durumu </th>
                                <th> Hasta Durumu </th>
                                <th> Tahlil Sonucu </th>
                                <th> Craetaed_at </th>
                                <th> Created_by </th>
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
                                            <a href="{{ route('hasta.edit', $hasta->_id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('hasta.delete', $hasta->_id) }}"
                                                onclick="return confirm('Silmek istediginden emin misiniz')"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
