<?php

namespace App\Dao;

use App\Exceptions\MonException;
use Illuminate\Support\Facades\DB;

class ServiceDessinateur
{
    public function GetListeDessinateur()
    {
        try {
            $MesDessinateur = DB::table('Dessinateur')
                ->Select()
                ->get();
            return $MesDessinateur;
        } catch (Illuminate\Database\QueryException $e) {
            throw new MonException ($e->getMessage(), 5);
        }

    }
}


