<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class RazaPerro extends Model{

  protected $fillable=['nombre', 'descripcion', 'tamanos_id', 'alturaInicial','user_id', 'alturaFinal'];


    public function tamanos(){
      return $this->belongsTo('App\Tamano','tamano_id');
    }

    public function temperamentos(){
      return $this->belongsToMany('App\Temperamento',
      'razaperro_temperamento',
      'razaperro_id',
      'temperamento_id')->withTimestamps();
    }
//forzar el nombre para que se establezca en minuscula al guardar
    public function setNombreAttribute($value){
    $this->attributes['nombre']=strtolower($value);
  }
  //fuerza el nombre a qe sea mayuscula al recuperarlo
  public function getNombreAttribute($value){
      return strtoupper($value);
    }
    public function user(){
      return $this->belongsTo('App\User');
    }

}
