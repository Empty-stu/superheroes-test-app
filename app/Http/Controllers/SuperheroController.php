<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Repositories\Contracts\SuperheroRepositoryInterface;
use App\Repositories\Contracts\SuperpowerRepositoryInterface;
use App\Repositories\ImageRepository;
use App\Repositories\SuperheroRepository;
use App\Repositories\SuperpowerRepository;
use Illuminate\Http\Request;


class SuperheroController extends Controller
{
    private $imageRepository;
    private $superpowerRepository;
    private $superheroRepository;

    public function __construct(ImageRepositoryInterface $imageRepository, SuperpowerRepositoryInterface $superpowerRepository, SuperheroRepositoryInterface $superheroRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->superpowerRepository = $superpowerRepository;
        $this->superheroRepository = $superheroRepository;
    }

    public function getCreateForm()
    {
        return view('create_superhero');
    }

    public function getHeroList()
    {
        $heroList = $this->superheroRepository->getAllSuperheroes();
        return view('home', ['heroes' => $heroList]);
    }

    public function getCompleteSuperheroInfo($id)
    {
        dd($id);
    }

    public function createSuperhero(Request $request)
    {
        $superheroId = $this->superheroRepository->createSuperhero($request->input('nickname'), $request->input('realName'), $request->input('description'), $request->input('catchphrase'));
        $this->superpowerRepository->setSuperheroPowers($superheroId, $request->input('superpowers'));
        $this->imageRepository->setSuperheroImages($superheroId, $request->heroPictures);
        return redirect()->back()->with('successMessage', 'Great, the hero been created!');
    }
}
