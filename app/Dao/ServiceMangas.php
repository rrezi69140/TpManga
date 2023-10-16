<?php

namespace App\Dao;

use http\Env\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
use Mockery\Exception;

class ServiceMangas
{
    public function GetListeManga()
    {
        try {
            $MesMangas = DB::table('manga')
                    ->Select()
                    ->join('genre', 'manga.id_genre', '=', 'genre.id_genre')
                    ->join('dessinateur', 'manga.id_dessinateur', 'dessinateur.id_dessinateur')
                    ->join('scenariste', 'manga.id_scenariste', '=', 'scenariste.id_scenariste')
                    ->get();
            return $MesMangas;
        } catch (Illuminate\Database\QueryException $e) {
            throw new MonException ($e->getMessage(), 5);
        }

    }

    public function ajoutMangas($IdDessinateur, $IdScenariste, $Pix, $Titre, $Couverture, $IdGenre)
    {
        try {
            DB::table('manga')->insert(
                ['id_dessinateur' => $IdDessinateur,
                    'id_scenariste' => $IdScenariste,
                    'prix' => $Pix,
                    'titre' => $Titre,
                    'couverture' => $Couverture,
                    'id_genre ' => $IdGenre
                ]);
        } catch (ILLuminate\Database\QueryException $e) {
            throw new MonException($e->getMessage(), code: 5);
        }
    }
}
