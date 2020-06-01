<?php


namespace App\Repositories\Contracts;


interface ImageRepositoryInterface
{
    public function addImage($superheroId);
    public function removeImage($imageId);
}
