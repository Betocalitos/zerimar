@extends('layouts.admin')

@section('body-class', 'login-page')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-5 col-lg-4">
        <div class="text-center mb-4">
            <h4 class="font-weight-bold" style="color: var(--zerimar-blue);">ZERIMAR</h4>
            <p class="text-muted" style="font-size: .75rem; letter-spacing: 2px; text-transform: uppercase;">Panel de Administración</p>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background:#fff;border-radius:0;"><i class="fas fa-envelope" style="color:var(--zerimar-blue);"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                   placeholder="admin@zerimar.com">
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background:#fff;border-radius:0;"><i class="fas fa-lock" style="color:var(--zerimar-blue);"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="current-password" placeholder="••••••••">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary toggle-password" id="toggle-password"
                                        style="border-radius:0;border-left:0;" title="Mostrar contraseña">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block" style="font-size:.9rem;">
                        <i class="fas fa-sign-in-alt mr-1"></i> Iniciar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function() {
    // Toggle password visibility
    $('#toggle-password').on('click', function() {
        var $input = $('#password');
        var $icon = $(this).find('i');

        if ($input.attr('type') === 'password') {
            $input.attr('type', 'text');
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
            $(this).attr('title', 'Ocultar contraseña');
        } else {
            $input.attr('type', 'password');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
            $(this).attr('title', 'Mostrar contraseña');
        }
    });
});
</script>
@endsection