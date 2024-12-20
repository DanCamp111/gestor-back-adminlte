<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index() {
        return Categoria::with('subcategorias')->get();
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'id_usuario' => 'required|exists:users,id',
        ]);

        $categoria = Categoria::create($validated);
        return response()->json($categoria, 201);
    }

    public function show($id) {
        $categoria = Categoria::findOrFail($id);
        return $categoria;
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'id_usuario' => 'required|exists:users,id',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($validated);

        return response()->json($categoria, 200);
    }

    public function destroy($id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return response()->json(null, 204);
    }
}

