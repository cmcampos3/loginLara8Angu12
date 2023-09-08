<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //Lista usuarios
    public function index()
    {
    $usuarios = Usuario::all();
    return response()->json($usuarios);
    }
    //Crea usuario
    public function store(Request $request)
    {
    $request->validate([
        'id' => 'required|integer|unique:usuarios',
        'tipodoc' =>'required|string',
        'docusu' => 'required|integer',
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'fnacimiento' => 'required|timestamp',
        'ciudadNacimiento' => 'required|string',
        'email' => 'required|email|unique:usuarios',
        'contrasena' => 'required|string',
    ]);

    $usuario = new Usuario();
    $usuario->tipoDoc = $request->input('tipodoc');
    $usuario->usuDoc = $request->input('docusu');
    $usuario->nombre = $request->input('nombre');
    $usuario->apellido = $request->input('apellido');
    $usuario->fNacimiento = $request->input('fnacimiento');
    $usuario->ciudadNacimiento = $request->input('ciudadNacimiento');
    $usuario->email = $request->input('email');
    $usuario->contrasena = bcrypt($request->input('contrasena'));
    $usuario->save();

    return response()->json(['mensaje' => 'Usuario creado correctamente'], 201);
    }
    //Busca usuario
    public function show($id)
    {
    $usuario = Usuario::find($id); //Revisar como enrutar busqueda ID, cedula, correo
    if (!$usuario) {
        return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
    }
    return response()->json($usuario);
    }
    //Actualiza usuario
    public function update(Request $request, $id)
    {
    $usuario = Usuario::find($id);
    if (!$usuario) {
        return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
    }

    $request->validate([
        'tipodoc' =>'required|string',
        'docusu' => 'required|integer',
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'fnacimiento' => 'required|timestamp',
        'ciudadNacimiento' => 'required|string',
        'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
        'contrasena' => 'required|string',
    ]);

    $usuario->tipoDoc = $request->input('tipodoc');
    $usuario->usuDoc = $request->input('docusu');
    $usuario->nombre = $request->input('nombre');
    $usuario->apellido = $request->input('apellido');
    $usuario->fNacimiento = $request->input('fnacimiento');
    $usuario->ciudadNacimiento = $request->input('ciudadNacimiento');
    $usuario->email = $request->input('email');
    $usuario->contrasena = bcrypt($request->input('contrasena'));
    $usuario->save();

    return response()->json(['mensaje' => 'Usuario actualizado correctamente']);
    }
    //Elimina usuario
    public function destroy($id)
    {
    $usuario = Usuario::find($id);
    if (!$usuario) {
        return response()->json(['mensaje' => 'Usuario no encontrado'], 404);
    }
    $usuario->delete();

    return response()->json(['mensaje' => 'Usuario eliminado correctamente']);
    }

}
