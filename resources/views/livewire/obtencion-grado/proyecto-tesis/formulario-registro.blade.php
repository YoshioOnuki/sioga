<div>
    <div class="card-body">
        <div class="card-title">Registro de Proyecto de Tesis</div>
        <div class="row g-3 mb-3">
            <div class="col-lg-6">
                <label for="codigo" class="form-label required">
                    Código de Tesista
                </label>
                <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" wire:model.live="codigo" placeholder="Ingrese su código" />
                @error('codigo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-lg-6" wire:ignore>
                <label for="asesor" class="form-label required">
                    Asesor
                </label>
                <input type="text" class="form-control @error('asesor') is-invalid @enderror" id="asesor" wire:model.live="asesor" placeholder="Seleccione su asesor" />
                @error('asesor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md">
                <label for="titulo-proyecto" class="form-label required">
                    Título de Proyecto de Tesis
                </label>
                <textarea class="form-control @error('titulo-proyecto') is-invalid @enderror" id="titulo-proyecto" wire:model.live="titulo-proyecto" placeholder="Ingrese el título de su proyecto"></textarea>
                @error('titulo-proyecto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md">
                <label for="proyecto" class="form-label required">
                    Seleccione su archivo
                </label>
                <input type="file" class="form-control @error('proyecto') is-invalid @enderror" id="proyecto" wire:model.live="proyecto" accept="image/*" />
                @error('proyecto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer bg-transparent mt-auto">
        <div class="btn-list justify-content-end">
            <button type="button" wire:click="registrar" class="btn btn-primary" wire:confirm="¿Está seguro de registrar su proyecto de tesis?">
                Registrar Proyecto de Tesis
            </button>
        </div>
    </div>
</div>
