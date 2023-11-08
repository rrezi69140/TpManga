<?php

namespace App\Http\Controllers;

use App\Dao\ServiceDessinateur;
use App\Dao\ServiceGenre;
use App\Dao\ServiceMangas;
use App\Dao\ServiceScenariste;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Request;



class MangasController extends Controller
{
    public function listerEmployes()
    {
        $MangasEntity = new ServiceMangas();
        try {
            $MesMangas = $MangasEntity->GetListeManga();
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/pageErreur', compact('monErreur'));
        }
        return view('vues/FrmListerManga', compact('MesMangas'));

    }
    public function FormAjouterMangas()
    {
        try {
            $UnServiceDessinateur = new ServiceDessinateur();
            $ListeDessinateur =  $UnServiceDessinateur->GetListeDessinateur();

            $UnServiceScenariste= new ServiceScenariste();
            $ListeScenariste =  $UnServiceScenariste->GetListeScenariste();

            $UnServiceGenre = new ServiceGenre();
            $ListeGenre =  $UnServiceGenre->GetListeGenre();
            return view('vues/formAjouterEmploye', compact('ListeDessinateur','ListeScenariste','ListeGenre'));

        } catch (Exception $e) {
            $monErreur = $e->getMessage();

        }
    }
    public function PostAjouterMangas()
    {
        try {

            $IdDessinateur = Request::input('Dessinateur');
            $IdScenariste = Request::input('Scenariste');
            $Pix = Request::input('Prix');
            $Titre = Request::input('Titre');
            $Couverture = Request::file('Couverture');
            $imageName = $Couverture->getClientOriginalName();
            $Couverture = Request::file('Couverture')->move(public_path().'/assets/images/',$imageName);

            $IdGenre = Request::input('Genre');


            $UnMangas = new ServiceMangas();
            $UnMangas->ajoutMangas($IdDessinateur, $IdScenariste, $Pix, $Titre, $Couverture, $IdGenre);

            return view('home');
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }
}
