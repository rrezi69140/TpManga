<?php

namespace App\Http\Controllers;

use App\Dao\ServiceMangas;
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
}
