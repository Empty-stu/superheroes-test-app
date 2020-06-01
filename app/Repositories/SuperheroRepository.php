<?php


namespace App\Repositories;


use App\SuperheroModel;

class SuperheroRepository implements Contracts\SuperheroRepositoryInterface
{
    private $superheroModel;

    public function __construct(SuperheroModel $model)
    {
        $this->superheroModel = $model;
    }

    public function createSuperhero($nickname, $realName, $description, $catchPhrase)
    {
        $superhero = new SuperheroModel();
        $superhero->nickname = $nickname;
        $superhero->real_name = $realName;
        $superhero->origin_description = $description;
        $superhero->catch_phrase = $catchPhrase;
        $superhero->save();
        return $superhero->id;
    }

    public function updateSuperhero($superheroId, $nickname, $realName, $description, $catchPhrase)
    {
        // TODO: Implement updateSuperhero() method.
    }

    public function deleteSuperHero($superheroId)
    {
        // TODO: Implement deleteSuperHero() method.
    }
}
