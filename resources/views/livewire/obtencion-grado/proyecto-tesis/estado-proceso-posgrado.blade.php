<div>
    <div class="card-body">
        <div class="card-title">Proyecto Registrado</div>
        <div class="row g-3">
            @if($proceso_numero == 1)
                <div class="alert alert-success" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" 
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" 
                            stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="alert-title">¡Su Proyecto de Tesis ha sido registrado satisfactoriamente!</h4>
                            <div class="text-secondary">
                                Título:
                                <strong>
                                    {{ $titulo_proyecto }}
                                </strong>
                            </div>
                            <div class="text-secondary">
                                Fecha:
                                <strong>
                                    {{ $fecha_aprobacion_proyecto }}
                                </strong>
                            </div>
                            <div class="text-secondary mt-1">
                                La comisión se Grados y Títulos de la Facultad de Posgrado, recibirá el proyecto de investigación a
                                través del <strong>SISTEMA WEB PARA LA GESTIÓN DEL PROCESO DE OBTENCIÓN DE GRADOS ACADÉMICOS</strong>, 
                                el mismo que deberá ser revisado en un plazo máximo de dos (2) días calendario, antes de ser derivado
                                a su respectivo asesor.
                            </div>
                        </div>
                    </div>
                </div>
            @endif
                @if($proceso_numero == 1)
                    <div class="alert alert-success" role="alert">
                        <div class="d-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" 
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" 
                                stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="alert-title">¡Notificación enviada satisfactoriamente a su asesor!</h4>
                                <div class="text-secondary">
                                    Su proyecto de tesis ha sido enviado a su asesor, luego de que la comisión de Grados y Títulos de la Facultad de Posgrado
                                    haya revisado su proyecto de tesis. Su asesor deberá revisar su proyecto de tesis para su aceptación o rechazo, en un plazo máximo de tres (3) días calendario.
                                    Recuerde tener en cuenta los siguientes puntos:
                                    <ul class="mt-2">
                                        <li>El proyecto de tesis debe ser revisado por su asesor en un plazo máximo de tres (3) días calendario.</li>
                                        <li>Si su asesor no acepta su proyecto de tesis, su proyecto de tesis será rechazado y deberá volver a registrarlo.</li>
                                        <li>Si su asesor acepta su proyecto de tesis, se sortearán los jurados por medio del Sistema de Obtención de Grados Académicos.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                
            {{-- @endif --}}
        </div>
    </div>
</div>