<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login',[LoginController::class,'login']);
Route::get('categorias', [CategoriaController::class, 'index']); // Listar todas las categorías
Route::post('categorias/save', [CategoriaController::class, 'store']); // Guardar nueva categoría
Route::get('categorias/{id}', [CategoriaController::class, 'show']); // Mostrar una categoría específica
Route::post('categorias/{id}/update', [CategoriaController::class, 'update']); // Actualizar una categoría
Route::delete('categorias/{id}/delete', [CategoriaController::class, 'destroy']); // Eliminar una categoría

// Rutas para subcategorías
Route::get('subcategorias', [SubcategoriaController::class, 'index']); // Listar todas las subcategorías
Route::post('subcategorias/save', [SubcategoriaController::class, 'store']); // Guardar nueva subcategoría
Route::get('subcategorias/{id}', [SubcategoriaController::class, 'show']); // Mostrar una subcategoría específica
Route::post('subcategorias/{id}/update', [SubcategoriaController::class, 'update']); // Actualizar una subcategoría
Route::delete('subcategorias/{id}/delete', [SubcategoriaController::class, 'destroy']); // Eliminar una subcategoría

