@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <h1><strong>Usuarios</strong><small class="text-muted"> Crear Usuario</small></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            
        </div>
        <form action="{{ route('usuarios.store') }}" method="POST">
        
        @csrf
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <p><strong>Nombre</strong></p>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                    
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>E-mail</strong></p>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                    
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>Chat ID</strong></p>
                    <input type="text" name="chat_id" value="{{ old('chat_id') }}" class="form-control @error('chat_id') is-invalid @enderror">
                    
                    @error('chat_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>Notificacion</strong></p>
                    <select name="notificacion" class="form-control @error('notificacion') is-invalid @enderror">
                        <option value="">Seleccione una opción</option>
                        <option value="1" {{ old('notificacion') == '1' ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ old('notificacion') == '0' ? 'selected' : '' }}>No</option>
                    </select>
                    
                    @error('notificacion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{---------------------------------------------------}}

            <div class="row mt-3">
                <div class="col-md-3">
                    <p><strong>Contraseña</strong></p>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <p><strong>Rol</strong></p>
                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="">Seleccione una opción</option>
                        <option value="superAdmin" {{ old('role') == 'superAdmin' ? 'selected' : '' }}>SuperAdmin</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="subsecretario" {{ old('role') == 'subsecretario' ? 'selected' : '' }}>Subsecretario</option>
                    </select>
                    
                    @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            {{---------------------------------------------------}}
        </div>
        <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-sm btn-success">
                GUARDAR DATOS
            </button>
        </div>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop