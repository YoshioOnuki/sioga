<div>
    <div class="card-body">
        @if($proceso_numero == 1)
            <div class="card-title">Proyecto Registrado</div>
            <div class="row g-3">
                <div class="alert alert-success" role="alert">
                    <div class="d-flex">
                        <div>
                            <livewire:obtencion-grado.proyecto-tesis.numero-proceso />
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
            </div>
        @endif
        @if($proceso_numero == 2)
            <div class="card-title">Enviado a su Asesor</div>
            <div class="row g-3">
                <div class="alert alert-success" role="alert">
                    <div class="d-flex">
                        <div>
                            <livewire:obtencion-grado.proyecto-tesis.numero-proceso />
                        </div>
                        <div>
                            <h4 class="alert-title">¡Notificación enviada satisfactoriamente a su asesor!</h4>
                            <div class="text-secondary">
                                Su proyecto de tesis ha sido enviado a su asesor, luego de que la comisión de Grados y Títulos de la Facultad de Posgrado
                                haya revisado su proyecto de tesis. Su asesor deberá revisar su proyecto de tesis para su aceptación o rechazo, en un plazo máximo de tres (3) días calendario.
                                Recuerde tener en cuenta los siguientes puntos:
                                <div class="mt-3 ms-3 row align-items-center">
                                    <div class="mb-2">
                                        <span class="badge bg-success me-3"></span>
                                        El proyecto de tesis debe ser revisado por su asesor en un plazo máximo de tres (3) días calendario.</li>
                                    </div>
                                    <div class="mb-2">
                                        <span class="badge bg-success me-3"></span>
                                        Si su asesor no acepta su proyecto de tesis, su proyecto de tesis será rechazado y deberá volver a registrarlo.</li>
                                    </div>
                                    <div class="mb-2">
                                        <span class="badge bg-success me-3"></span>
                                        Si su asesor acepta su proyecto de tesis, se sortearán los jurados por medio del Sistema de Obtención de Grados Académicos.</li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($proceso_numero == 3)
            <div class="card-title">¡Felicidades!</div>
            <div class="row g-3">
                <div class="alert alert-success" role="alert">
                    <div class="d-flex">
                        <div>
                            <livewire:obtencion-grado.proyecto-tesis.numero-proceso />
                        </div>
                        <div>
                            <h4 class="alert-title">¡Su proyecto de tesis fue aceptado por su asesor!</h4>
                            <div class="text-secondary">
                                Su proyecto de tesis fue aceptado por su asesor, por lo que se procederá a sortear los jurados para su proyecto de tesis.
                                Recuerde tener en cuenta los siguientes puntos:
                                <div class="mt-3 ms-3 row align-items-center">
                                    <div class="mb-2">
                                        <span class="badge bg-success me-3"></span>
                                        El sorteo de los jurados se realizará en un plazo máximo de dos (2) días calendario.
                                    </div>
                                    
                                    <div class="mb-2">
                                        <span class="badge bg-success me-3"></span>
                                        Una vez sorteados los jurados, se procederá a notificar a los jurados para realizar observaciones a su proyecto de tesis.</li>
                                    </div>
                                    <div class="mb-2">
                                        <span class="badge bg-success me-3"></span>
                                        Los jurados deberán realizar sus observaciones a su proyecto de tesis en un máximo de quince (15) días calendario.</li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>