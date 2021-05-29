@extends('layouts.app')

@section('scripts')


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script type="text/javascript">
        var i = 0;
        console.log('BEfore adding');

        $("#add").click(function() {
            console.log('AFter adding');

            ++i;

            $("#dynamicTable").append(
                '<tr><td><input type="text" name="key[]" placeholder="Enter THE new Attribute Name" class="form-control" required /></td><td><input type="text" name="value[]" placeholder="Enter The Values" class="form-control" required /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
            );

        });

        $(document).on('click', '.remove-tr', function() {

            $(this).parents('tr').remove();

        });

    </script>


@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Hasta Form</div>
                    <div class="card-body">
                        <form action="{{ route('hasta.save') }}">
                            @csrf
                            <div class="form-group">
                                <label for="usr">Name:</label>
                                <input type="text" class="form-control"required name="name">
                            </div>

                            <div class="form-group">
                                <label for="comment">age:</label>
                                <input type="number" class="form-control"required name="age">
                            </div>

                            <div class="form-group">

                                <label for="sel1">Select Gender:</label>
                                <select class="form-control"required id="sel1" name="gender">
                                    <option>Erkek</option>
                                    <option>Kadin</option>

                                </select>
                            </div>
                            <div class="form-group">

                                <label for="sel2">Asi DURUMU:</label>
                                <select class="form-control"required id="sel2" name="asi">
                                    <option>Evet</option>
                                    <option>Hayir</option>
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

                                <label for="sel2">HASTA DURUMU:</label>
                                <select class="form-control"required id="sel2" name="durum">
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

                            <div>
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('success') }}</p>
                                    </div>
                                @endif
                                <table class="table table-bordered" id="dynamicTable">
                                    <tr>
                                        <th>new Attribute</th>
                                        <th>Value</th>

                                    </tr>
                                    <tr>
                                        <td><button type="button" name="add" id="add" class="btn btn-success">Add
                                            Attributes</button></td>
                                    </tr>
                                </table>

                            </div>

                            <p action=ret align="center"><button class="btn btn-primary">Save</button></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
