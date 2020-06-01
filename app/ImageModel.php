<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    protected $table = 'images';
    public $timestamps = false;
    public function superhero() {
        return $this->belongsTo(SuperheroModel::class);
    }
}
