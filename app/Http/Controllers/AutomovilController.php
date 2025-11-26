<?php

namespace App\Http\Controllers;

use App\Models\Automovil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutomovilController extends Controller
{
    public function index()
    {
        $automoviles = Automovil::orderBy('auto_id', 'desc')->get();
        return response()->json($automoviles);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'auto_name' => 'required|string|max:100',
            'auto_modelo' => 'required|string|max:50',
            'auto_marca' => 'required|string|max:50',
            'auto_pais' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $automovil = Automovil::create($request->all());
        return response()->json($automovil, 201);
    }

    public function show($id)
    {
        $automovil = Automovil::find($id);
        
        if (!$automovil) {
            return response()->json(['message' => 'Automóvil no encontrado'], 404);
        }

        return response()->json($automovil);
    }

    public function update(Request $request, $id)
    {
        $automovil = Automovil::find($id);
        
        if (!$automovil) {
            return response()->json(['message' => 'Automóvil no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'auto_name' => 'required|string|max:100',
            'auto_modelo' => 'required|string|max:50',
            'auto_marca' => 'required|string|max:50',
            'auto_pais' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $automovil->update($request->all());
        return response()->json($automovil);
    }

    public function destroy($id)
    {
        $automovil = Automovil::find($id);
        
        if (!$automovil) {
            return response()->json(['message' => 'Automóvil no encontrado'], 404);
        }

        $automovil->delete();
        return response()->json(['message' => 'Automóvil eliminado correctamente']);
    }
}