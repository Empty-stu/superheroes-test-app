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

    public function getUpdateForm($id)
    {
        $hero = $this->superheroRepository->getSuperhero($id);
        return view('update_superhero', ['hero' => $hero]);
    }

    public function getHeroList()
    {
        $heroList = $this->superheroRepository->getAllSuperheroes();
        return view('home', ['heroes' => $heroList]);
    }

    public function getCompleteSuperheroInfo($id)
    {
        $hero = $this->superheroRepository->getSuperhero($id);
        return view('superhero', ['hero' => $hero]);
    }

    public function createSuperhero(Request $request)
    {
        $superheroId = $this->superheroRepository->createSuperhero($request->input('nickname'), $request->input('realName'), $request->input('description'), $request->input('catchphrase'));
        $this->superpowerRepository->addSuperheroPowers($superheroId, $request->input('superpowers'));
        $this->imageRepository->addSuperheroImages($superheroId, $request->heroPictures);
        return redirect()->back()->with('successMessage', 'Great, the hero been created!');
    }

    public function updateSuperhero(Request $request, $id)
    {
        $this->superheroRepository->updateSuperhero($id, $request->input('nickname'), $request->input('realName'), $request->input('description'), $request->input('catchphrase'));
        if(!is_null($request->input('superpowers'))) {
            $this->superpowerRepository->addSuperheroPowers($id, $request->input('superpowers'));
        }
        if(!is_null($request->heroPictures)) {
            $this->imageRepository->addSuperheroImages($id, $request->heroPictures);
        }
        return redirect()->back()->with('successMessage', 'Great, the hero been updated!');
    }

    public function deleteSuperpower($id)
    {
        $this->superpowerRepository->removeSuperpower($id);
        return redirect()->back()->with('successMessage', 'Great, the superpower been deleted!');
    }

    public function deleteImage($id)
    {
        $this->imageRepository->removeImage($id);
        return redirect()->back()->with('successMessage', 'Great, the superpower been deleted!');
    }

    public function deleteSuperhero($id)
    {
        $this->superheroRepository->deleteSuperhero($id);
        return redirect('/')->with('successMessage', 'Great, the superhero been deleted!');
    }
}
