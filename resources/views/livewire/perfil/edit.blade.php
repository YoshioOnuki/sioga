<div>
    <div class="page-header d-print-none animate__animated animate__fadeIn animate__faster">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('perfil', ['usuario_id' => $usuario_id]) }}">Perfil</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Editar Perfil</a>
                            </li>
                        </ol>
                    </div>
                    <h2 class="page-title text-uppercase">
                        Editar Perfil
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card card-stacked animate__animated animate__fadeIn animate__faster">
                <form autocomplete="off" wire:submit="guardar">
                    <div class="row g-0">
                        <div class="col-12 col-md-3 border-end">
                            <div class="card-body">
                                <h4 class="subheader">
                                    Configuración
                                </h4>
                                <div class="list-group list-group-transparent">
                                    <div
                                        class="list-group-item list-group-item-action d-flex align-items-center active">
                                        Perfil
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 d-flex flex-column">
                            <div class="card-body">
                                <h2 class="mb-4">
                                    Editar Perfil
                                </h2>
                                <h3 class="card-title">
                                    Avatar
                                </h3>
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto">
                                        @if ($avatar)
                                            <img src="{{ $avatar->temporaryUrl() }}" alt="avatar"
                                                class="avatar avatar-lg">
                                        @elseif ($avatar_temp)
                                            <img src="{{ asset($avatar_temp) }}" alt="avatar"
                                                class="avatar avatar-lg">
                                        @else
                                            @php
                                                $persona = App\Models\Persona::find($usuario->persona_id);
                                            @endphp
                                            @if ($persona)
                                                <img src="{{ asset($persona->avatar) }}" alt="avatar"
                                                    class="avatar avatar-lg ">
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-auto">
                                        <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                            id="avatar" wire:model.live="avatar" accept="image/*" />
                                        @error('avatar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" wire:click="eliminar_avatar"
                                            wire:confirm="¿Está seguro de eliminar el avatar?" wire:loading.attr="disabled"
                                            class="btn btn-ghost-danger">
                                            Eliminar avatar
                                        </button>
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-lg-4">
                                        <label for="apellido_paterno" class="form-label required">
                                            Apellido Paterno
                                        </label>
                                        <input type="text"
                                            class="form-control @error('apellido_paterno') is-invalid @enderror"
                                            id="apellido_paterno" wire:model.live="apellido_paterno"
                                            placeholder="Ingrese su apellido paterno" />
                                        @error('apellido_paterno')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="apellido_materno" class="form-label required">
                                            Apellido Materno
                                        </label>
                                        <input type="text"
                                            class="form-control @error('apellido_materno') is-invalid @enderror"
                                            id="apellido_materno" wire:model.live="apellido_materno"
                                            placeholder="Ingrese su apellido materno" />
                                        @error('apellido_materno')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="nombre" class="form-label required">
                                            Nombres
                                        </label>
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                            id="nombre" wire:model.live="nombre" placeholder="Ingrese su nombre" />
                                        @error('nombre')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md" wire:ignore>
                                        <label for="ubigeo" class="form-label required">
                                            Ubigeo
                                        </label>
                                        <select class="form-select @error('ubigeo') is-invalid @enderror" id="ubigeo"
                                            wire:model.live="ubigeo" placeholder="Seleccione un ubigeo">
                                            <option value="">
                                                Seleccione un ubigeo
                                            </option>
                                            @foreach ($ubigeo_model as $item)
                                                <option value="{{ $item->ubigeo_id }}">
                                                    {{ $item->ubigeo_codigo }} /
                                                    {{ $item->ubigeo_departamento }} /
                                                    {{ $item->ubigeo_provincia }} /
                                                    {{ $item->ubigeo_distrito }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ubigeo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <label for="contraseña" class="form-label">
                                            Modificar Contraseña
                                        </label>
                                        <input type="password"
                                            class="form-control @error('contraseña') is-invalid @enderror"
                                            id="contraseña" wire:model.live="contraseña"
                                            placeholder="Ingrese su contraseña" />
                                        @error('contraseña')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="confirmar_contraseña" class="form-label">
                                            Confirmación de Contraseña
                                        </label>
                                        <input type="password"
                                            class="form-control @error('confirmar_contraseña') is-invalid @enderror"
                                            id="confirmar_contraseña" wire:model.live="confirmar_contraseña"
                                            placeholder="Ingrese su confirmación de contraseña" />
                                        @error('confirmar_contraseña')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <a href="{{ route('perfil', ['usuario_id' => $usuario_id]) }}"
                                        class="btn btn-outline-secondary">
                                        Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        Guardar Cambios
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        document.addEventListener('livewire:navigated', () => {
            $(document).ready(function() {
                // asignar tomselect al select con id ubigeo
                new TomSelect("#ubigeo", {
                    create: false,
                    valueField: 'ubigeo_id',
                    persist: false,
                    allowEmptyOption: true,
                });
                // Livewire.hook('morph.updated', ({
                //     el,
                //     component
                // }) => {
                //     new TomSelect("#ubigeo", {
                //         create: false,
                //         valueField: 'ubigeo_id',
                //         persist: false,
                //         allowEmptyOption: true,
                //     });
                // })
            });
        })
    </script>
@endscript
