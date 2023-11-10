<?php

namespace App\Http\Controllers;

use App\Dao\ServiceDessinateur;
use App\dao\ServiceEmploye;
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

            $RequestteCouverture = Request::file('Couverture');
            if(isset($RequestteCouverture)){
                $imageName = $RequestteCouverture->getClientOriginalName(); // partie de gestion d'ajout d'image
                Request::file('Couverture')->move(public_path().'/assets/images/',$imageName);
            }
            else{
                $imageName = "None.pnj";
            }

            $IdGenre = Request::input('Genre');


            $UnMangas = new ServiceMangas();
            $UnMangas->ajoutMangas($IdDessinateur, $IdScenariste, $Pix, $Titre, $imageName, $IdGenre);


        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
    }

    public function modifier($id_manga)
    {
        try {
            $unMangaService = new ServiceMangas();
            $unManga = $unMangaService->getManga($id_manga);
            $UnServiceDessinateur = new ServiceDessinateur();
            $ListeDessinateur =  $UnServiceDessinateur->GetListeDessinateur();

            $UnServiceScenariste= new ServiceScenariste();
            $ListeScenariste =  $UnServiceScenariste->GetListeScenariste();

            $UnServiceGenre = new ServiceGenre();
            $ListeGenre =  $UnServiceGenre->GetListeGenre();
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));
        }
        return view('vues/formModifierManga', compact('unManga','ListeDessinateur','ListeScenariste','ListeGenre'));
    }


    public function PostModifierMangas($id = null)
    {
        $code = $id;
        $IdDessinateur = Request::input('Dessinateur');
        $IdScenariste = Request::input('Scenariste');
        $Pix = Request::input('Prix');
        $Titre = Request::input('Titre');

        $RequestteCouverture = Request::file('Couverture');
        if(isset($RequestteCouverture)){
            $imageName = $RequestteCouverture->getClientOriginalName(); // partie de gestion d'ajout d'image
                Request::file('Couverture')->move(public_path().'/assets/images/',$imageName);
        }
        else{
            $imageName = "None.pnj";
        }

        $IdGenre = Request::input('Genre');
        try {
            $unMangaService = new ServiceMangas();
            $unMangaService->modificationManga($IdDessinateur, $IdScenariste, $Pix, $Titre, $imageName, $IdGenre, $code);
            return view('layouts/master');
        } catch (MonException $e) {
            $monErreur  = $e->getMessage();
            return view('view vues/error', compact("monErreur"));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/error', compact('monErreur'));

        }
    }
}
