<?php

namespace App\Http\Controllers;

use App\Dao\ServiceDessinateur;
use App\dao\ServiceEmploye;
use App\Dao\ServiceGenre;
use App\Dao\ServiceMangas;
use App\Dao\ServiceScenariste;
use App\Exceptions\MonException;
use Illuminate\Http\Request;

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




            $IdDessinateur = \Illuminate\Support\Facades\Request::input('IdDessinateur');
            $IdScenariste = Request::input('IdScenariste');
            $Pix = Request::input('Pix');
            $Titre = Request::input('$itre');
            $Couverture = Request::input('Couverture');
            $IdGenre = Request::input('IdGenre');


            $UnMangas = new ServiceMangas();
            $UnMangas->ajoutMangas($IdDessinateur, $IdScenariste, $Pix, $Titre, $Couverture, $IdGenre);

            return view('home');
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }
}
