<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table="empleado";
    protected $fillable = [
        'nombre',
        'email',
        'sexo',
        'area_id',
        'boletin',
        'descripcion',
    ];

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function rol(){
        return $this->belongsTo(Empleado_rol::class, 'id', 'empleado_id', 'rol_id');
    }
}
