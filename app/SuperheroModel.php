<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperheroModel extends Model
{
    protected $table = 'superheroes';
    public $timestamps = false;
    public function images() {
        return $this->hasMany(ImageModel::class, 'superhero_id');
    }
    public function superpowers() {
        return $this->hasMany(SuperpowerModel::class, 'superhero_id');
    }
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($superhero) {
            foreach ($superhero->superpowers as $superpower) {
                $superpower->delete();
            }
            foreach ($superhero->images as $image) {
                $image->delete();
            }
        });
    }
}
