<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado_rol extends Model
{
    use HasFactory;
    protected $table="empleado_rol";

    public function empleado(){
        return $this->hasMany(Empleado::class);
    }
}
