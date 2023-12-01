<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class TestAccer extends TestCase
{

    public function test_Acces_Page_Master(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function Acces_Modification_refuse_Pour_Utilisateur_Deconnecter():void{
        $reponsse = $this->get('/ModifierMangas/1');
        $reponsse->assertStatus(401);
    }
}
