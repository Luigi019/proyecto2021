<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class docsController extends Controller
{
    public function index(){
        return "Bienvenido a Documentos!";
    }
    public function upload(){
        return "En esta página podrá subir un documento";
    }
    public function show($doc){
        return "Documento: $doc";
    }
}
