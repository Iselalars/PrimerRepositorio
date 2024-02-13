<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Nivel;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{

    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', ['alumnos'=> $alumnos]);
    }

    public function create()
    {
        return view('alumnos.create',['niveles'=>Nivel::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
                'matricula' =>'required|unique:alumnos|max:10',
                'nombre' =>'required|max:250',
                'fecha' =>'required|date',
                'telefono' =>'required',
                'email' =>'nullable|email',
                'nivel' =>'required',]
        );

        $alumno = new Alumno();
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input('nivel');
        $alumno->save();

        return view("alumnos.message", ['msg' => "Registro guardado"]);

    }

    public function show(Alumno $alumno)
    {
        //
    }

    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('alumnos.update', ['alumno' => $alumno, 'niveles' => Nivel::all()]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'matricula' =>'required|max:10|unique:alumnos,matricula,'.$id,
            'nombre' =>'required|max:250',
            'fecha' =>'required|date',
            'telefono' =>'required',
            'email' =>'nullable|email',
            'nivel' =>'required',]
    );

    $alumno = Alumno::find($id);
    $alumno->matricula = $request->input('matricula');
    $alumno->nombre = $request->input('nombre');
    $alumno->fecha_nacimiento = $request->input('fecha');
    $alumno->telefono = $request->input('telefono');
    $alumno->email = $request->input('email');
    $alumno->nivel_id = $request->input('nivel');
    $alumno->save();

    return view("alumnos.message", ['msg' => "Registro modificado"]);
    }

    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();

        return redirect("alumnos");
    }
}
