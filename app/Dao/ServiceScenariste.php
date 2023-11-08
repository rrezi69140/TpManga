<?php

namespace App\Dao;

use App\Exceptions\MonException;
use Illuminate\Support\Facades\DB;

class ServiceScenariste
{
    public function GetListeScenariste()
    {
        try {
            $MesScenariste = DB::table('Scenariste')
                ->Select()
                ->get();
            return $MesScenariste;
        } catch (Illuminate\Database\QueryException $e) {
            throw new MonException ($e->getMessage(), 5);
        }

    }
}
