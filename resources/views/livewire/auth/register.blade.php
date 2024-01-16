<div>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('media/logo-dark.PNG') }}" height="100" alt="Logo"
                        class="rounded hide-theme-light">
                    <img src="{{ asset('media/logo-light.PNG') }}" height="100" alt="Logo"
                        class="rounded hide-theme-dark">
                </a>
            </div>
            <form wire:submit.prevent="registrar" class="card card-md" action="./" method="get" autocomplete="off" novalidate>
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Crear cuenta</h2>
                    <div class="mb-3">
                        <label class="form-label required">
                            Código
                        </label>
                        <input id="codigo" type="text"
                            class="form-control @error('codigo') is-invalid @enderror"
                            wire:model.live="codigo" placeholder="0002190363" autocomplete="off">
                        @error('codigo')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">
                            Número de documento
                        </label>
                        <input id="numero_documento" type="text"
                            class="form-control @error('numero_documento') is-invalid @enderror"
                            wire:model.live="numero_documento" placeholder="76934415" autocomplete="off">
                        @error('numero_documento')
                        <span class="form-text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-blue w-100">
                            Validar datos
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}" tabindex="-1">Iniciar sesión</a>
            </div>
        </div>
    </div>
</div>
