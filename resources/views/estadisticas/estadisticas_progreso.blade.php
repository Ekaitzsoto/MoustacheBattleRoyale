<div>
    @if ($restantes->count() == 1)
        @if($guerra->estado == "Finalizada")
            <h5 class="text-center">Ganador: {{$restantes->get(0)->nombre}}</h5>
            <div class="progress bg-danger-subtle" role="progressbar" aria-label="subtle" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <div class="progress-bar overflow-visible text-black text-center bg-danger-subtle" style="width: 100%">Guerra finalizada</div>
            </div>
        @else
        <div class="progress bg-danger-subtle" role="progressbar" aria-label="subtle" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            <div class="progress-bar overflow-visible text-black text-center bg-success-subtle" style="width: 100%">Guerra sin comenzar</div>
        </div>
        @endif
    @else
        <h5>Restantes:  {{$restantes->count()}}</h5>
        <div class="progress-stacked">
            <div class="progress" role="progressbar" aria-label="animado" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{$porcientoVivos}}%">
                <div class="progress-bar  @if($guerra->estado == "En curso") progress-bar-striped progress-bar-animated @endif @if($porcientoVivos >= 65) bg-success @elseif ($porcientoVivos >20) bg-warning @elseif($porcientoVivos <=20) bg-danger @endif"></div>
            </div>
            <div class="progress" role="progressbar" aria-label="subtle" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: {{$porcientoMuertos}}%">
                <div class="progress-bar @if($porcientoVivos >= 65) bg-success-subtle @elseif ($porcientoVivos >20) bg-warning-subtle @elseif($porcientoVivos <=20) bg-danger-subtle @endif"></div>
            </div>
        </div>
    @endif
</div>
