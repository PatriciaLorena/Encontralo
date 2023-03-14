<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
      protected $table = 'categorias';

      protected $primaryKey = 'idCategoria';

      public $timestamps = false;

      protected $fillable = [
          'nombre',
          'descripcion',
      ];

      protected $guarded = [];
}
