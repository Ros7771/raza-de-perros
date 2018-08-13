<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamano extends Model
{
    public function razaperros(){
      return $this->hasMany('App\RazaPerro');
    }
}
