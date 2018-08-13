<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $fillable=['name','permissions'];
  public function users(){
    return $this->belongsToMany(
      'App\User',
      'role_user',
      'role_id',
      'user_id'
    )->withTimestamps();
  }
  public function tieneAcceso(array $permissions){
    foreach($permissions as $permiso){
      if($this->tienePermiso($permiso)){
        return true;
      }
    }
    return false;
  }
  public function tienePermiso(string $permiso){
    $permisos=json_decode($this->permissions,true);
    return $permisos[$permiso]??false;
  }


}
