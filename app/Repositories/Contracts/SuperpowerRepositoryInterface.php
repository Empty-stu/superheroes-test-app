<?php


namespace App\Repositories\Contracts;


interface SuperpowerRepositoryInterface
{
    public function addSuperpower($superheroId, $superpower);
    public function setSuperheroPowers($superheroId, $superpower);
}
