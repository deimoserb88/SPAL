@extends('layouts.admin')


@section('content')

<div class="container">

<div class="row" style="margin-top:20px;">
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Avance
            </div>
            <div class="panel-body" style="min-height: 130px;">
                <table class="tabel table-hover table-condensed" style="width:100%;">
                    <tbody>
                        <tr>
                            <td>Inscritos</td>
                            <td class="text-center"><h4><span class="label label-primary">{{ $i }}</span></h4></td>
                            <td class="text-center">100%</td>
                        </tr>
                        <tr>
                            <td>Contestaron</td>
                            <td class="text-center"><h4><span class="label label-primary">{{ $e }}</span></h4></td>
                            <td class="text-center">{{ printf("%.1f",$i>0?$e*100/$i:0) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-primary" id="avance">Ver avance</button>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Resultados detallados
            </div>
            <div class="panel-body" style="min-height: 130px;">
                Concentrado de resultados con descripción de conceptos.                
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-primary" id="detalles">Ver detalle</button>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Resultados generales
            </div>
            <div class="panel-body" style="min-height: 130px;">
                Tabla de resultados generales para toda la Universidad de Colima
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-primary" id="resulgenerales">Ver resultados generales</button>
            </div>       
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Resultados delegación
            </div>
            <div class="panel-body" style="min-height: 130px;">
                Tabla de resultados generales para toda la Universidad de Colima con resumen por delegación
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-primary" id="resulgeneralesdeleg">Ver resultados por delegación</button>
            </div> 
        </div>
    </div>
</div>



</div>

@endsection

@section('scripts')

<script type="text/javascript">

    $(document).ready(function(){
        $("#avance").click(function(){
            window.location.href='{{ url('/avance') }}';
        });       
        $("#detalle").click(function(){
            window.location.href='{{ url('/resultados/detallados') }}';
        });

        $("#resulgenerales").click(function(){
            window.open('{{ url('/resultados/generales') }}','_blank');
        });

        $("#resulgeneralesdeleg").click(function(){
            window.open('{{ url('/resultados/deleg') }}','_blank');
        });

    });


</script>

@endsection
