<?php


namespace App\Repositories;


use App\ImageModel;

class ImageRepository implements Contracts\ImageRepositoryInterface
{
    private $imageModel;

    public function __construct(ImageModel $model)
    {
        $this->imageModel = $model;
    }

    public function addImage($superheroId, $image)
    {
        $imageName = $image->getClientOriginalName();
        $image->storeAs('public/heroAvatars/'.$superheroId, $imageName);
        $imageModel = new ImageModel();
        $imageModel->superhero_id = $superheroId;
        $imageModel->image_path = 'storage/heroAvatars/'.$superheroId.'/'.$imageName;
        $imageModel->save();
    }

    public function removeImage($imageId)
    {
        // TODO: Implement removeImage() method.
    }

    public function setSuperheroImages($superheroId, $images)
    {
        foreach ($images as $heroImage) {
            $this->addImage($superheroId, $heroImage);
        }
    }
}
