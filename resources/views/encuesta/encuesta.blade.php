@extends('layouts.main')

@section('content')

<div class="container">
	Muy bien, aqui va a ir la encuesta
	{{ $datos->plant }}{{ $datos->carr }}
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    
    $(document).ready(function(){    

    });


</script>

@endsection