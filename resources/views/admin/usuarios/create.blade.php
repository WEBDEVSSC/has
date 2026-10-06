@extends('adminlte::page')

@section('title', 'Crear Usuario')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-2">
        <div>
            <h1 class="font-weight-bold m-0" style="color: #2C3E50;">
                Gestión de Usuarios
            </h1>
            <p class="text-muted small m-0">Registro de un nuevo usuario en la plataforma</p>
        </div>
    </div>
@stop

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">

        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="font-weight-bold m-0" style="color: #2C3E50;">
                    <i class="fas fa-user-plus mr-2" style="color: #2E7D32;"></i> Crear Nuevo Usuario
                </h5>
            </div>

            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf

                <div class="card-body px-4 pb-3">

                    <div class="row">
                        {{-- NOMBRE COMPLETO --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name" class="font-weight-semibold text-secondary">
                                    <i class="fas fa-user text-muted mr-1"></i> Nombre Completo <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control rounded-lg @error('name') is-invalid @enderror" placeholder="Nombre completo" required style="border-color: #CED4DA;">
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email" class="font-weight-semibold text-secondary">
                                    <i class="fas fa-envelope text-muted mr-1"></i> Correo Electrónico <span class="text-danger">*</span>
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control rounded-lg @error('email') is-invalid @enderror" placeholder="correo@coahuila.gob.mx" required style="border-color: #CED4DA;">
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- CHAT ID --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="chat_id" class="font-weight-semibold text-secondary">
                                    <i class="fab fa-telegram-plane text-muted mr-1"></i> Chat ID
                                </label>
                                <input type="text" id="chat_id" name="chat_id" value="{{ old('chat_id') }}" class="form-control rounded-lg @error('chat_id') is-invalid @enderror" placeholder="ID de Chat" style="border-color: #CED4DA;">
                                @error('chat_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- NOTIFICACIÓN --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="notificacion" class="font-weight-semibold text-secondary">
                                    <i class="fas fa-bell text-muted mr-1"></i> Recibir Notificaciones
                                </label>
                                <select id="notificacion" name="notificacion" class="form-control rounded-lg custom-select @error('notificacion') is-invalid @enderror" style="border-color: #CED4DA;">
                                    <option value="">Seleccione una opción</option>
                                    <option value="1" {{ old('notificacion') == '1' ? 'selected' : '' }}>Sí</option>
                                    <option value="0" {{ old('notificacion') == '0' ? 'selected' : '' }}>No</option>
                                </select>
                                @error('notificacion')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        {{-- CONTRASEÑA --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="password" class="font-weight-semibold text-secondary">
                                    <i class="fas fa-key text-muted mr-1"></i> Contraseña <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control rounded-lg @error('password') is-invalid @enderror" placeholder="Contraseña de acceso" required style="border-color: #CED4DA;">
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- ROL --}}
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="role" class="font-weight-semibold text-secondary">
                                    <i class="fas fa-user-shield text-muted mr-1"></i> Rol de Usuario <span class="text-danger">*</span>
                                </label>
                                <select id="role" name="role" class="form-control rounded-lg custom-select @error('role') is-invalid @enderror" required style="border-color: #CED4DA;">
                                    <option value="">Seleccione una opción</option>
                                    <option value="superAdmin" {{ old('role') == 'superAdmin' ? 'selected' : '' }}>SuperAdmin</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="subsecretario" {{ old('role') == 'subsecretario' ? 'selected' : '' }}>Subsecretario</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Usuario</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer bg-light border-0 px-4 py-3 d-flex justify-content-between align-items-center" style="border-bottom-left-radius: 12px; border-bottom-right-radius: 12px;">
                    <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary px-4 font-weight-bold" style="border-radius: 20px;">
                        <i class="fas fa-arrow-left mr-1"></i> Regresar
                    </a>
                    <button type="submit" class="btn text-white px-4 font-weight-bold" style="background-color: #2E7D32; border-radius: 20px;">
                        <i class="fas fa-save mr-1"></i> Guardar Datos
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

@stop

@section('footer')
<div class="text-center text-muted py-2">
    <small>Copyright © <?php echo date('Y') ?> <strong>Servicios de Salud de Coahuila de Zaragoza</strong>. Todos los derechos reservados.</small>
</div>
@stop

@section('css')
<style>
    body {
        background-color: #F4F6F9 !important;
        font-family: 'Roboto', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }
    .card {
        border-radius: 12px !important;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08) !important;
    }
</style>
@stop

@section('js')
<script>
    console.log("Vista de creación de usuario cargada correctamente.");
</script>
@stop