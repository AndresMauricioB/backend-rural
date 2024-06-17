<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProtectedController extends Controller
{
    public function getProtectedData(Request $request)
    {
        // Obtener el usuario de Firebase autenticado
      $data = $request->attributes->get('firebaseUser');
      //$data = $request->all();
      //$data = $request->query('page', 1);
      //$data = $request->json()->all();

        // Retornar la respuesta JSON
        return response()->json([
            'message' => 'This is protected data este es',
            'user' => $data
        ]);
    }
}
