<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_empresa extends Model
{
  protected $table = 'usuario_empresas';

  public $timestamps = false;

  protected $fillable = [

      'idEmpresa',
      'id',

];

protected $guarded = [];
}
