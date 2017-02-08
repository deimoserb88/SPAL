@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="text-success">BIENVENIDO</h2>
            {{ Form::open(['url'=>'encuesta','method'=>'post']) }}
            <div class="panel panel-default">
                <div class="panel-heading">Encuesta de satisfacción con el proceso de admisión</div>
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1" style="margin-bottom: 10px ; text-align: justify;">
                        <h3>Estimad@ estudiante de nuevo ingreso, nos interesa conocer tu opinión para evaluar el proceso de admisión y así poder tomar decisiones para mejorarlo.</h3>
                    </div>
                    <div class="alert alert-info col-md-10 col-md-offset-1">
                        Para iniciar la encuesta, a continuación selecciona tu plantel y el programa educativo al que ingresaste:
                        <br>

                        <div class="input-group col-md-8 col-md-offset-2" style="margin-top: 10px;">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Plantel</span>
                                <select name="plant" id="plant" class="form-control" required="required">
                                    <option></option>
                                    @foreach($planteles as $plantel)
                                        <option value="{{ $plantel->plant }}" {{ ($plantel->plant == $plant?'selected="selected"':'') }}>{{ $plantel->nomplant }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-group" style="margin-top: 10px;">
                                <span class="input-group-addon" id="basic-addon1">Programa</span>
                                <select name="id_programa" id="id_programa" class="form-control" disabled="disabled" required="required">
                                    <option disabled="disabled" selected="selected" value="" class="empty">-- Selecciona primero tu plantel --</option>
                                        @foreach($programas as $programa)
                                            <option value="{{ $programa->id }}" class="{{ $programa->plant }}">{{ $programa->nomcarr }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <button type="submit" class="btn btn-primary btn-block btn-lg enviar">Ir a la encuesta <i class="fa fa-sign-in"></i></button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">

    $(document).ready(function(){
        $("#id_programa").val('');
        $("#id_programa").attr("disabled",true);
        $("#plant").change(function(){
            $("#id_programa").children().css('display','inherit');
            $("#id_programa").children().not("."+$("#plant").val()).css('display','none');
            $("#id_programa").val(99);
            $("#id_programa").attr("disabled",false);
        });

        /*$(".enviar").click(function(){
            window.location.href='encuesta/'+$("#plant").val()+'/'+$("#id_programa").val();
        });*/
    });


</script>

@endsection
