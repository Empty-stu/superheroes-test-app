<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperpowerModel extends Model
{
    protected $table = 'superpowers';
    public $timestamps = false;
    public function superhero() {
        return $this->belongsTo(SuperheroModel::class);
    }
}
