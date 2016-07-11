@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h2 class="text-success">BIENVENIDO</h2>
            <div class="panel panel-default">
                <div class="panel-heading">Encuesta de satisfacción con el proceso de admisión</div>
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1" style="margin-bottom: 10px ; text-align: justify;">
                        <h3>Estimad@ estudieante de nuevo ingreso, nos interesa conocer tu opinión para evaluar el proceso de admisión y así poder tomar desiciones para mejorarlo.</h3>
                    </div>
                    <div class="alert alert-success col-md-10 col-md-offset-1">
                        Para iniciar la encuesta, a continuación selecciona tu plantel y el programa educativo al que ingresaste:
                        <br>
                        <div class="input-group col-md-8 col-md-offset-2" style="margin-top: 10px;">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Plantel</span>
                                <select name="plant" id="plant" class="form-control">
                                    <option></option>
                                    <?php if(!isset($plant)) $plant = "";?>
                                    @foreach($planteles as $plantel)
                                        <option value="{{ $plantel->plant }}" {{ ($plantel->plant == $plant?'selected="selected"':'') }}>{{ $plantel->nomplant }}</option>
                                    @endforeach
                                </select>                                
                            </div>
                            <div class="input-group" style="margin-top: 10px;">
                                <span class="input-group-addon" id="basic-addon1">Programa</span>
                                <select name="carr" id="carr" class="form-control">
                                    @if(isset($programas))
                                        @foreach($programas as $programa)
                                            <option value="{{ $programa->carr }}">{{ $programa->nomcarr }}</option>
                                        @endforeach
                                    @else
                                        <option disabled="disabled" selected="selected" value="">Selecciona primero el plantel</option>
                                    @endif
                                </select>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <button class="btn btn-primary enviar">Ir a la encuesta <i class="fa fa-sign-in"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    
    $(document).ready(function(){    
        $("#plant").change(function(){
            //alert($(this).val());
            window.location.href='/'+$(this).val();
        });
        $(".enviar").click(function(){
            window.location.href='encuesta/'+$("#plant").val()+'/'+$("#carr").val();
        });
    });


</script>

@endsection