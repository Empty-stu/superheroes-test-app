<?php


namespace App\Repositories\Contracts;


interface SuperpowerRepositoryInterface
{
    public function addSuperpower($superheroId, $superpower);
    public function removeSuperpower($superpowerId);
    public function addSuperheroPowers($superheroId, $superpower);
}
