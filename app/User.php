<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  public function roles(){
    return $this->belongsToMany(
      'App\Role',
      'role_user',
      'user_id',
      'role_id'
    )->withTimestamps();
  }
  public function razaPerros(){
    return $this->hasMany('App\RazaPerro');
  }

  public function tieneAcceso(array $permissions){
    foreach($this->roles as $role){
      if($role->tieneAcceso($permissions)){
        return true;
      }
    }
    return false;
  }
  public function tieneRol($nombre){
    return $this->roles()->where('name',$nombre)->count()==1;
  }

}
