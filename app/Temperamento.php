<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temperamento extends Model
{
    public function razaperros(){
      return $this->belongsToMany('App\RazaPerro',
      'razaperro_temperamento',
      'temperamento_id',
      'razaperro_id')->withTimestamps();
    }
}
