<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use App\Models\Area;
use App\Models\Rol;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create(Request $request){

        $areas = Area::all();
        $roles = Rol::all();
        $atributos = [
            'areas'=>$areas,
            'roles'=>$roles
        ];
        return view('formulario', ['atributos'=> $atributos]);
    }

    public function save_create(Request $request){
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|max:255|unique:empleado',
            'sexo' => 'required|max:255',
            'area' => 'required|max:255',
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
        ]);
        $empleado = new Empleado;
        $empleado->nombre = $request->input('nombre');
        $empleado->email = $request->input('email');
        $empleado->sexo = $request->input('sexo');
        $empleado->area_id = $request->input('area');
        $empleado->boletin = 0;
        $empleado->descripcion = $request->input('descripcion');
        $empleado->save();
        return back()->with('success','Guardada con exito!');
    }

    public function read(){

        $data = Empleado::all();
        return view('tabla', ['empleados' => $data]);
    }

    public function update(){
        $area = Area::all();
        $rol = Rol::all();
        $empleado = Empleado::all();
        return view('formulario');
    }

    public function delete(){

    }
}
