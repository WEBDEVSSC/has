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

    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'chat_id' => 'required|string|max:255',
            'notificacion' => 'required|integer|in:0,1',
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,subsecretario,superAdmin,user',
        ],[
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede exceder los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede exceder los 255 caracteres.',
            'email.unique' => 'El correo electrónico ya se encuentra registrado.',

            'chat_id.required' => 'El Chat ID es obligatorio.',
            'chat_id.max' => 'El Chat ID no puede exceder los 255 caracteres.',

            'notificacion.required' => 'Debe seleccionar una opción de notificación.',
            'notificacion.integer' => 'La notificación debe ser un valor válido.',
            'notificacion.in' => 'La opción de notificación seleccionada no es válida.',

            'password.min' => 'La contraseña debe contener al menos 8 caracteres.',

            'role.required' => 'Debe seleccionar un rol.',
            'role.in' => 'El rol seleccionado no es válido.',
        ]);

        $usuario = User::findOrFail($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->chat_id = $request->chat_id;
        $usuario->notificacion = $request->notificacion;
        if ($request->filled('password')) 
        {
            $usuario->password = bcrypt($request->password);
        }
        $usuario->role = $request->role;

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
