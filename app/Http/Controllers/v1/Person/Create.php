<?php

namespace App\Http\Controllers\v1\Person;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class Create extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        $uid = $request->attributes->get('uid');

        // Agregar el UID al array de datos
        $data['uid'] = $uid;

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:people',
            'img' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ]);

        // Crear un nuevo registro de Person
        $person = Person::create($validatedData);

        return response()->json([
            'message' => 'Person created successfully',
            'data' => $person,
        ], 201);
    }
}
