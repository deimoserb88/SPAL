@extends('layouts.admin')

@section('estilos')
    {!! Html::style('assets/vendor/datatables/media/css/dataTables.bootstrap.min.css') !!}
@endsection

@section('content')

<div class="container">


	<div class="col-md-10 col-md-offset-1" style="margin-bottom:20px;">
		<form class="form-horizontal" action="{{ url('inscritos/guardar') }}" method="post">
			{{ csrf_field() }}
			<h4>Captura de inscritos {{ $anio }}</h4>
			<table class="table table hover">
				<thead>
					<tr>
						<td style="width:90%">Programa</td>
						<td>Inscritos</td>
					</tr>
				</thead>
				<tbody>
					@foreach($p as $plant)
					<tr class="info">
						<td colspan="2">{{ $plant->nomplant }}</td>
					</tr>
					@foreach($plant->programa as $prog)
					<tr>
						<td>{{ $prog->nomcarr }}</td>
						<td>
							<input class="form-control" name="{{ $prog->id }}" value="{{ isset($i[$prog->id])?$i[$prog->id]:'' }}" type="number" required="required" size="3" min="0" max="150" />
						</td>
					</tr>
					@endforeach
				</tbody>		

				@endforeach
			</table>	
			<button type="submit" class="btn btn-success btn-block">Guardar inscritos</button>
		</form>
	</div>
</div>



@endsection

@section('scripts')

{!! Html::script('assets/vendor/datatables/media/js/jquery.dataTables.min.js') !!}
{!! Html::script('assets/vendor/datatables/media/js/dataTables.bootstrap.min.js') !!}

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
