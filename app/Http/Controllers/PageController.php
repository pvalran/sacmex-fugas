<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageController extends  Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function ciudadano(Request $request)
    {
        return view('ciudadano');
    }

    public function operador(Request $request)
    {
        return view('operador');
    }

    public function regional(Request $request)
    {
        return view('regional');
    }

    public function regionallistado(Request $request)
    {
        return view('regional-listado');
    }

    public function seguimiento(Request $request)
    {
        return view('seguimiento');
    }

    public function administracion(Request $request){
        return view('administracion');
    }

    public function reportes(Request $request){
        return view('reportes');
    }

    public function mobile(Request $request){
        return view('mobile');
    }


}
