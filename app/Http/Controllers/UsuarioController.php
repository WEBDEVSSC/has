<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    //
    public function index()
    {
        $usuarios = User::all();
        
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'chat_id' => 'required|string|max:255',
            'notificacion' => 'required|integer|in:0,1',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,subsecretario,superAdmin',
        ],[
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'chat_id.required' => 'El campo chat ID es obligatorio.',
            'notificacion.required' => 'El campo notificación es obligatorio.',
            'notificacion.integer' => 'El campo notificación debe ser un número entero.',
            'notificacion.in' => 'El campo notificación debe ser 0 o 1.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'role.required' => 'El campo rol es obligatorio.',
            'role.in' => 'El campo rol debe ser admin, subsecretario o superAdmin.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'chat_id' => $request->chat_id,
            'notificacion' => $request->notificacion,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }
}
