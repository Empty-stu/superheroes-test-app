<?php


namespace App\Repositories;


use App\SuperpowerModel;

class SuperpowerRepository implements Contracts\SuperpowerRepositoryInterface
{
    private $superPowerModel;

    public function __construct(SuperpowerModel $model)
    {
        $this->superPowerModel = $model;
    }

    public function addSuperpower($superheroId, $superpowerName)
    {
        $superpower = new SuperpowerModel();
        $superpower->superhero_id = $superheroId;
        $superpower->superpower_name = $superpowerName;
        $superpower->save();
    }


    public function removeSuperpower($superpowerId)
    {
        $this->superPowerModel->findOrFail($superpowerId)->delete();
    }

    public function addSuperheroPowers($superheroId, $superpowersString)
    {
        $superpowersArray = splitMultilineStringOnArrayOfStrings($superpowersString);
        foreach ($superpowersArray as $superpower) {
            $this->addSuperpower($superheroId, $superpower);
        }
    }
}
