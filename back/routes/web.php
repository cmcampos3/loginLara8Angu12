<?php

use Illuminate\Support\Facades\Route;

// Ruta para listar usuarios
Route::get('/usuarios', 'UsuarioController@index');

// Ruta para mostrar el formulario de creación de usuarios
Route::get('/usuarios/crear', 'UsuarioController@create');

// Ruta para procesar el formulario de creación de usuarios
Route::post('/usuarios', 'UsuarioController@store');

// Ruta para mostrar un usuario específico
Route::get('/usuarios/{id}', 'UsuarioController@show');

// Ruta para mostrar el formulario de edición de un usuario
Route::get('/usuarios/{id}/editar', 'UsuarioController@edit');

// Ruta para actualizar un usuario específico
Route::put('/usuarios/{id}', 'UsuarioController@update');

// Ruta para eliminar un usuario específico
Route::delete('/usuarios/{id}', 'UsuarioController@destroy');

Route::get('/', function () {
    return view('welcome');
});
