<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

  protected $table = 'empresas';

  protected $primaryKey = 'idEmpresa';

  public $timestamps = false;

  protected $fillable = [
      'nombreEmpresa',
      'direccion',
      'ruc',
      'telefono',
      'correo',
      'descripcion',
      'latidud',
      'longitud'
  ];
  public function users(){
    return $this->belongsToMany('User::class')->withTimesTamps();
  }
  protected $guarded = [];
}
