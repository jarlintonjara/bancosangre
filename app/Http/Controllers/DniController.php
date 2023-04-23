<?php

namespace App\Http\Controllers;

use App\Models\Dni;
use Illuminate\Http\Request;

class DniController extends Controller
{
    public function buscar(Request $request)
    {
        $n_documento = $request->input('n_documento');
        $datos = Dni::where('DOCUMENTO', $n_documento)->first();
        return response()->json(['datos' => $datos]);
    }
}
