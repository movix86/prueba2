<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use App\Models\Area;
use App\Models\Rol;
use App\Http\Requests\EmpleadoFormValidator;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create(Request $request){

        $areas = Area::all();
        $roles = Rol::all();
        $data = [
            'estate' => 0,
            'areas'=>$areas,
            'roles'=>$roles
        ];
        return view('formulario', ['data'=> $data]);
    }

    public function save_create(Request $request, EmpleadoFormValidator $validator){

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

    public function update($id){
        $user = Empleado::where('id', $id)->first();
        $area = Area::where('id', $user->area_id)->first();
        $areas = Area::all();
        $roles = Rol::all();

        $data = [
            'estate' => 1,
            'info'=>$user,
            'area_user'=>$area,
            'areas'=>$areas,
            'roles'=>$roles
        ];
        return view('formulario', ['data' => $data]);
    }

    public function save_update(Request $request, EmpleadoFormValidator $validator){
        if ($request->input('id')) {
            $empleado = Empleado::find($request->input('id'));
            $empleado->nombre = $request->input('nombre');
            $empleado->email = $request->input('email');
            $empleado->sexo = $request->input('sexo');
            $empleado->area_id = $request->input('area');
            $empleado->boletin = 0;
            $empleado->descripcion = $request->input('descripcion');
            $empleado->save();
            return back()->with('success','Actualizado con exito!');
        }
    }

    public function delete($id){
        $user = Empleado::where('id', $id)->first();
        $user->delete();
        return back()->with('success','Empleado eliminado con exito!');
    }
}
