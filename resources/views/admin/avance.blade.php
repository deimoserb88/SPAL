@extends('layouts.admin')

@section('estilos')
    {{ Html::style('/public/assets/vendor/datatables/media/css/dataTables.bootstrap.min.css') }}
@endsection

@section('content')

<div class="container">
<table class="table table-striped" id="tavance">
    <thead>
        <tr>
            <th class="text-center">Deleg</th>
            <th>Plantel</th>
            <th>Programa</th>
            <th><button type="button" class="btn btn-link btn-xs" data-toggle="tooltip" data-placement="right" title="Inscritos/Contestados">I/C</button></th>
            <th>Avance</th>
        </tr>
    </thead>
    <tbody>
        @if(count($i) > 0)
            @foreach($e as $encuesta)
                <?php
                    $ins = $i[$encuesta->id];               
                    $av = ceil($encuesta->ver * 100 / $ins);
                ?>
                <tr><td class="text-center">D{{ $encuesta->id_deleg }}</td>
                    <td>{{ $encuesta->nomplant }}</td>
                    <td>{{ $encuesta->nomcarr }}</td>
                    <td>{{ $ins }} / {{ $encuesta->ver }}</td>
                    <td class="text-center">
                        <div class="progress">
                          <div class="progress-bar progress-bar-{{ $av >= 100 ? 'success' : ($av < 50 ? 'danger' : 'warning') }}" role="progressbar" aria-valuenow="{{ $av }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $av }}%">
                             {{ $av }}%
                          </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5"><p class="alert alert-warning">No hay encuestas para el periodo <b>{{ $anio }}</b></p></td>
            </tr>
        @endif
    </tbody>
</table>

</div>



@endsection

@section('scripts')

{{ Html::script('/public/assets/vendor/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('/public/assets/vendor/datatables/media/js/dataTables.bootstrap.min.js') }}

<script type="text/javascript">

    $(document).ready(function(){
        $('#tavance').DataTable({
            "scrollY": 480,
            "scrollCollapse": true,
            "paging": false,
            "info": false,
            "language": {
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros que coincidan",
            },
            "select": true,
            "emptyTable" : "No hay datos para mostrar"
        });
    });

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })

</script>

@endsection
