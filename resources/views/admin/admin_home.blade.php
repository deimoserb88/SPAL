@extends('layouts.admin')

@section('content')

<div class="container">

<div class="row" style="margin-top:20px;">
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Avance
            </div>
            <div class="panel-body">
                <table class="tabel table-hover table-condensed" style="width:100%;">
                    <tbody>
                        <tr>
                            <td>Inscritos</td>
                            <td class="text-center"><h4><span class="label label-primary">{!! $i !!}</span></h4></td>
                            <td class="text-center">100%</td>
                        </tr>
                        <tr>
                            <td>Contestaron</td>
                            <td class="text-center"><h4><span class="label label-primary">{!! $e !!}</span></h4></td>
                            <td class="text-center">{!! printf("%.1f",$e*100/$i) !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-primary" id="avance">Ver datalle</button>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Resultados detallados
            </div>
            <div class="panel-body">
                se han contestado . . .
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Resultados generales
            </div>
            <div class="panel-body">
                lorem ipsum . . .
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Resultados delegación
            </div>
            <div class="panel-body">
                lorem ipsum . . .
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
    });


</script>

@endsection
