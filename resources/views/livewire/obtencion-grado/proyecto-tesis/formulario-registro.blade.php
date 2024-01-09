<div>
    <div class="card-body">
        <div class="card-title">Registro de Proyecto de Tesis</div>
        <div class="row g-3 mb-3">
            <div class="col-md">
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
                <label for="titulo_proyecto" class="form-label required">
                    Título de Proyecto de Tesis
                </label>
                <textarea class="form-control @error('titulo_proyecto') is-invalid @enderror" id="titulo_proyecto" wire:model.live="titulo_proyecto" placeholder="Ingrese el título de su proyecto"></textarea>
                @error('titulo_proyecto')
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
                <input type="file" class="form-control @error('proyecto') is-invalid @enderror" id="proyecto" wire:model.live="proyecto" accept="pdf" />
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
            <button type="button" class="btn btn-primary" wire:click="confirmar">
                Registrar Proyecto de Tesis
            </button>
        </div>
    </div>

    <div wire:ignore.self class="modal" id="modal_confimacion" tabindex="-1">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-primary"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 icon-tabler icon-tabler-help text-primary icon-lg" width="24" height="24" 
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" 
                        stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 17l0 .01" />
                        <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                    </svg>
                    <h3>¿Estás seguro?</h3>
                    <div class="text-secondary">¿Desea registrar su proyecto de tesis?<br>Una vez registrado no podrá modificarlo.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            
                            <div class="col">
                                <button type="button" class="btn btn-bg-muted w-100" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" wire:click="registrar" class="btn btn-primary w-100">
                                    Confirmar
                                </button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
