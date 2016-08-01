@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="text-success">¡GRACIAS!</h2>
            <div class="panel panel-default">
                <div class="panel-heading">Encuesta de satisfacción con el proceso de admisión</div>
                <div class="panel-body">
                    <div class="alert alert-success" style="margin-bottom: 10px ; text-align: center;">
                        <h3>Agradecemos ampliamente tu valiosa participación en este estudio</h3>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <a class="btn btn-link" href="{{ url('http://www.ucol.mx/') }}">Universidad de Colima</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">

    $(document).ready(function(){

    });

</script>

@endsection
