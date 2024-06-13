<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtectedController extends Controller
{
    public function getProtectedData(Request $request)
    {
        // Obtener el usuario de Firebase autenticado
      //  $firebaseUser = $request->attributes->get('firebaseUser');
      $data = $request->all();

        // Retornar la respuesta JSON
        return response()->json([
            'message' => 'This is protected data',
            'user' => $data
        ]);
    }
}
