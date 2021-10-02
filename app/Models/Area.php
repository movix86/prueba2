<?php

namespace App\Models;

use App\Http\Livewire\Empleados;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $table="areas";

    public function empleado(){
        return $this->hasMany(Empleado::class);
    }
}
