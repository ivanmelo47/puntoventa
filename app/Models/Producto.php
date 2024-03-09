<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "producto";

    protected $primaryKey = "id_producto";

    public $timestamps = false;

    protected $fillable = [
        'id_categoria',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estatus'
    ];

    //Esta es la 'RELACION CARGADA' con la tabla categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    protected $guarded = [
        /* Campos que no queremos incluir */
    ];
}
