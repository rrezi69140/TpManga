<?php

namespace App\Dao;

use App\Exceptions\MonException;
use Illuminate\Support\Facades\DB;

class ServiceGenre
{
    public function GetListeGenre()
    {
        try {
            $MesGenres = DB::table('genre')
                ->Select()
                ->get();
            return $MesGenres;
        } catch (Illuminate\Database\QueryException $e) {
            throw new MonException ($e->getMessage(), 5);
        }

    }
}
