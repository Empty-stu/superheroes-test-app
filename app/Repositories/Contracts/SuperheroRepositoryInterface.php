<?php


namespace App\Repositories\Contracts;


interface SuperheroRepositoryInterface
{
    public function createSuperhero($nickname, $realName, $description, $catchPhrase);
    public function getAllSuperheroes();
    public function getSuperhero($id);
    public function updateSuperhero($superheroId, $nickname, $realName, $description, $catchPhrase);
    public function deleteSuperHero($superheroId);
}
