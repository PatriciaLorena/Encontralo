<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';

    protected $primaryKey = 'idArticulo';

    public $timestamps = false;

    protected $fillable = [

        'idCategoria',
        'idMarca',
        'idEmpresa',
        'nombre',
        'codigo',
        'descripcion',
        'imagen',
        'caducidad',
        'estado',

  ];

  protected $guarded = [];
}
