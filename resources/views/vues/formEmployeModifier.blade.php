@extends('layouts.master')
@section('content')
    <div>
        <br><br>
        <br><br>
        <div class="well">
            {!! Form::open(array('route' => array ('postmodifierEmploye' , $unEmploye->numEmp),'method'=>'post')) !!}
            <div class="col-md-12 col-sm-12 well well-md">
                <center><h1></h1></center>
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Civilité : </label>
                        <div class="col-md-2 col-sm-2">
                            <p>
                                <input type="radio" name="civilite" value="Mme"
                                @if ($unEmploye->civilite == "Mme")
                                    checked="checked"
                                @endif
                                /> Madame
                            </p>
                            <p>
                                <input type="radio" name="civilite" value="Mlle"
                                       @if ($unEmploye->civilite == "Mlle")
                                       checked="checked"
                                    @endif
                                /> Mademoiselle
                            </p>
                            <p>
                                <input type="radio" name="civilite" value="Mr"
                                       @if ($unEmploye->civilite == "Mr")
                                       checked="checked"
                                    @endif
                                /> Monsieur
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Nom : </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="nom" value="{{$unEmploye->nom}}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Prenom : </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="text" name="prenom" value="{{$unEmploye->prenom}}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Mot de passe : </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="password" name="passe" value="{{$unEmploye->pwd}}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Profil : </label>
                        <div class="col-md-2 col-sm-2">
                            <p>Vous êtes <br/>
                            <select name="profil">
                                 @if ($unEmploye->profil == 'parti')
                                        <option value="parti" selected="selected">Un particulier</option>
                                 @else
                                        <option value="parti">Un particulier</option>
                                 @endif

                                @if ($unEmploye->profil == 'profe')
                                         <option value="profe" selected="selected">Un professionnel</option>
                                @else
                                         <option value="profe">Un professionnel</option>
                                @endif

                                @if ($unEmploye->profil == 'insti')
                                         <option value="insti" selected="selected">Un institutionnel</option>
                                @else
                                         <option value="insti">Un institutionnel</option>
                                @endif
                            </select>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Quel type de présentation recherchez-vous ?</label>
                        <div class="col-md-2 col-sm-2">
                            <p>
                                @if ($unEmploye->interet == 'loc')
                                    <input type="checkbox" name="interet" value="loc" checked="checked"/>Location de mobilier
                                @else
                                    <input type="checkbox" name="interet" value="loc"/>Location de mobilier
                                @endif

                                @if ($unEmploye->interet == 'achat')
                                        <input type="checkbox" name="interet" value="achat" checked="checked"/>Achat de mobilier
                                @else
                                        <input type="checkbox" name="interet" value="achat"/>Achat de mobilier
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 control-label">Votre message : </label>
                        <div class="col-md-2 col-sm-2">
                            <p>
                                <textarea name="le-message" rows="6" cols="40">{{$unEmploye->message}}</textarea>
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <button type="submit" class="btn btn-default btn-primary">
                                <span class="glyphicon glyphicon-ok"></span>Valider
                            </button>
                            &nbsp;
                            <button type="button" class="btn btn-default btn-primary"
                                    onclick="javascript:if(confirm('vous êtes sûr ?'))
                                        window.location='{{url('/')}}';">
                                <span class="glyphicon glyphicon-remove"></span>Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
