<?php

namespace App\Http\Controllers;
use App\Models\Empleados;

use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function Empleados(){
        $datos['empleados']= Empleados::all();
        dd($datos);
        return view('view',$datos);
    }
}
