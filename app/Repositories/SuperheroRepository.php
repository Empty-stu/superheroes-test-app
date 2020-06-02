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

    public function getAllSuperheroes()
    {
        return $this->superheroModel->simplePaginate(5);
    }


    public function getSuperhero($id)
    {
        return $this->superheroModel->findOrFail($id);
    }

    public function updateSuperhero($superheroId, $nickname, $realName, $description, $catchPhrase)
    {
        $superhero = $this->superheroModel->find($superheroId);
        $superhero->nickname = $nickname;
        $superhero->real_name = $realName;
        $superhero->origin_description = $description;
        $superhero->catch_phrase = $catchPhrase;
        $superhero->save();
    }

    public function deleteSuperhero($superheroId)
    {
        $this->superheroModel->findOrFail($superheroId)->delete();
    }
}
