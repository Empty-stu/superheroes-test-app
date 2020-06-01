<?php


namespace App\Repositories\Contracts;


interface ImageRepositoryInterface
{
    public function addImage($superheroId, $image);
    public function removeImage($imageId);
    public function setSuperheroImages($superheroId, $images);
}
