<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Empleados;
use Illuminate\Support\Facades\DB;
use App\Models\Empleado;
use App\Models\Area;
use App\Models\Rol;
use App\Models\Empleado_rol;
use App\Http\Requests\EmpleadoFormValidator;
use App\Http\Requests\EmpleadoUpdateValidator;

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

        DB::transaction(function () use ($request) {
            tap(Empleado::create([
                'nombre' => $request->input('nombre'),
                'email' => $request->input('email'),
                'sexo' => $request->input('sexo'),
                'area_id' => $request->input('area'),
                'boletin' => 0,
                'descripcion' => $request->input('descripcion'),
            ]), function ($id_emp) use ($request) {
                $this->create_rol($id_emp, $request);
            });

        });
        #En este caso cuando se crea el usuario, seguido dispara el metodo create_rol cpn los datos del usuario creado
        return back()->with('success','Guardado con exito!');
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
        #dd($data['info']->rol->rol_id);
        return view('formulario', ['data' => $data]);
    }

    public function save_update(Request $request, EmpleadoUpdateValidator $validator){
        if ($request->input('id')) {
            $empleado = Empleado::find($request->input('id'));
            $empleado->nombre = $request->input('nombre');
            $empleado->email = $request->input('email');
            $empleado->sexo = $request->input('sexo');
            $empleado->area_id = $request->input('area');
            $empleado->boletin = 0;
            $empleado->descripcion = $request->input('descripcion');
            $this->update_rol($request);
            $empleado->save();


            return back()->with('success','Actualizado con exito!');
        }
    }

    public function delete($id){
        $user = Empleado::where('id', $id)->first();
        $user->delete();
        return back()->with('success','Empleado eliminado con exito!');
    }
    public function update_rol($request){
        #dd($request->id);
        $area = Empleado_rol::where('empleado_id', $request->input('id'))->first();
        $area->rol_id = $request->input('rol');
        $area->save();
    }
    public function create_rol($id_emp, $request){
        $num = count($request->input('rol'));
        for ($i=0; $i < $num; $i++) {
            Empleado_rol::create([
                'empleado_id' => $id_emp->id,
                'rol_id' => $request->input('rol')[$i]
            ]);
        }
    }
}
