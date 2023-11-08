@extends ('layouts.master')
@section ('content')
    {!! Form::open(['url' => 'postAjouterManga']) !!}
    <div class="col-md-12 col-sm-12 well well-md">
        <center><h1>Ajouter un mangas </h1></center>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Dessinateur : </label>
                <div class="col-md-2 col-sm-2">
                    <select id="Dessinateur" name="Dessinateur">
                        @foreach($ListeDessinateur As $UnDessianteur)
                            <option value="{{$UnDessianteur->id_dessinateur}}">{{$UnDessianteur->nom_dessinateur}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Scenariste : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="Scenariste" id = "Scenariste">
                        @foreach($ListeScenariste As $UnScenariste)
                            <option value="{{$UnScenariste->id_scenariste}}">{{$UnScenariste->nom_scenariste}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Genre : </label>
                <div class="col-md-2 col-sm-2">
                    <select name="Genre" id="Genre">
                        @foreach($ListeGenre As $UnGenre)
                            <option value="{{$UnGenre->id_genre}}">{{$UnGenre->lib_genre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Prix </label>
                    <div class ="col-md-3 col-sm-2">
                        <input type="text" name="Prix" value="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 control-label">Titre : </label>
                    <div class ="col-md-3 col-sm-2">
                        <input type="text" name="Titre" value="" class="form-control" required>
                    </div>
                </div>

            <div class="form-group">
                <label class="col-md-3 col-sm-3 control-label">Titre </label>
                <div class ="col-md-3 col-sm-2">
                    <input type="file"   name="Couverture">
                </div>
            </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <button type="submit" class="btn btn-default btn-primary">
                <span class="glyphicon glyphicon-ok"></span> Valider
            </button>
            &nbsp;
            <button type="button" class="btn btn-default btn-primary"
                    onclick="javascript:if(confirm('vous êtes sur')) window.location = '{{ url('/')}}';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler</button>
        </div>
    </div>
    </div>
    </div>
