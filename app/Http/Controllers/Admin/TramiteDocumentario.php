<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TramiteDocumentario extends Controller
{
    public function index(){
        return view('Admin.TramiteDocumentario.index');
    }
}
