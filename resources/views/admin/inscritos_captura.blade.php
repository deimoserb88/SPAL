@extends('layouts.admin')

@section('estilos')
    {!! Html::style('assets/vendor/datatables/media/css/dataTables.bootstrap.min.css') !!}
@endsection

@section('content')

<div class="container">
	<form class="form-horizontal" action="{{ url('inscritos_guardar')}} " method="post">
	<table class="table table hover">
		<thead>
			<tr>
				<td>Programa</td>
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
						<input class="form-control" name="{{ $prog->id }}" value="{{ count($i)>0?$i[$prog->id]:'' }}" type="number" required="required" size="3" min="0" max="100" />
					</td>
				</tr>
				@endforeach
		</tbody>		
		@endforeach
	</table>
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
