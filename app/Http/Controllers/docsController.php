<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class docsController extends Controller
{
    public function index(){
        return view('documentos');
    }
    public function upload(){
        return "En esta página podrá subir un documento";
    }
    public function getDocs($oficina, $doc = null){
        if (!$doc){
            return "Documentos de la oficina: $oficina";
        }else{
            return "Documento: $doc, de la oficina: $oficina";
        }
    }
    
}
