@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="blanc">
            <h1>Liste de mes MANGAS</h1>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>id_manga</th>
                <th>id_dessinateur</th>
                <th>id_scenariste</th>
                <th>prix</th>
                <th>titre</th>
                <th>couverture</th>
                <th>id_genre</th>
            </tr>
            </thead>
            @foreach ($MesMangas as $UnMangas)
                <tr>
                    <td> {{ $UnMangas->id_manga }} </td>
                    <td>{{ $UnMangas->	id_dessinateur }} </td>
                    <td>{{ $UnMangas->id_scenariste }} </td>
                    <td> {{$UnMangas->prix }} </td>
                    <td> {{$UnMangas->titre }}</td>
                    <td><img src= "{{ url("/assets/images")}}/{{$UnMangas->couverture}}" class="imageListe" ></td>
                    <td> {{$UnMangas->id_genre }} </td>
                    <td style="text-align:center;">
                        <a href="{{ url("/ModifierMangas") }}/{{ $UnMangas->id_manga}}">
                            <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier">

                            </span>
                        </a>
                    </td>
                </tr>
            @endforeach
            <BR> <BR>
        </table>
    </div>
