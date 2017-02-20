@extends('layouts.admin')

@section('estilos')
    {!! Html::style('assets/vendor/datatables/media/css/dataTables.bootstrap.min.css') !!}
@endsection

@section('content')

<div class="container">

    <div class="panel panel-info">
        <div class="panel panel-heading">
            <div class="input-group col-md-12">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Plantel</span>
                    <select name="plant" id="plant" class="form-control plant" required="required">
                        <option value="">TODOS</option>
                        @foreach($planteles as $plantel)
                            <option value="{{ $plantel->plant }}" {{ ($plantel->plant == $plant?'selected=selected':'') }}>{{ $plantel->nomplant }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group" style="margin-top: 10px;">
                    <span class="input-group-addon" id="basic-addon2">Programa</span>
                    <select name="id_programa" id="id_programa" class="form-control" {{ ($plant != '%%' ?'':'disabled="disabled"') }} required="required">
                        <option value="">TODOS</option>
                            @foreach($programas as $programa)
                                <option value="{{ $programa->id }}" class="{{ $programa->plant }}" {{ ($programa->id == $id_programa?'selected="selected"':'') }}>{{ $programa->nomcarr }}</option>
                            @endforeach
                    </select>
                </div>
            </div>            
            <button class="btn btn-primary enviar" style="margin-top: 10px;">Ver Resultados</button>
            <pre style="margin-top: 10px;">
                <b>{{ $deleg[0]['delegacion'] }}
                Total de encuestas aplicadas: {{ $tea }}
                Año: {{ $anio }}</b>
            </pre>
        </div>
        <div class="panel-body">
           
            @if($tea>0)

                <table class="table table-striped table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>#</th><th>Aspecto evaluado</th><th class="text-center">1</th><th class="text-center">%</th><th class="text-center">2</th><th class="text-center">%</th><th class="text-center">3</th><th class="text-center">%</th><th class="text-center">4</th><th class="text-center">%</th><th class="text-center">5</th><th class="text-center">%</th><th class="text-center">6</th><th class="text-center">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="info" colspan="14">Información general</th>
                        </tr>
                        <tr><td>1</td><td>{{ SPAL\Encuesta::$items[1] }}</td>
                        @foreach($gene1 as $g1)
                            <td class="text-center"><b>{{ $g1 }}</b></td><td class="text-center"><small><?php printf("%.1f",$g1 * 100 / $tea); ?></small></td>
                        @endforeach
                        </tr>
                        <tr><td>2</td><td>{{ SPAL\Encuesta::$items[2] }}</td>
                        @foreach($gene2 as $g2)
                            <td class="text-center"><b>{{ $g2 }}</b></td><td class="text-center"><small><?php printf("%.1f",$g2 * 100 / $tea); ?></small></td>
                        @endforeach
                        </tr>
                        <tr><td>3</td><td>{{ SPAL\Encuesta::$items[3] }}</td>
                        @foreach($gene3 as $g3)
                            <td class="text-center"><b>{{ $g3 }}</b></td><td class="text-center"><small><?php printf("%.1f",$g3 * 100 / $tea); ?></small></td>
                        @endforeach
                        </tr>                    

                        <tr>
                            <th class="info" colspan="14">Inscripciones al proceso de admisión</th>
                        </tr>
                        <tr><td>4</td><td>{{ SPAL\Encuesta::$items[4] }}</td>
                        @foreach($ipa2 as $p2)                        
                            <td class="text-center"><b>{{ $p2 }}</b></td><td class="text-center"><small><?php printf("%.1f",$p2 * 100 / $tea); ?></small></td>
                        @endforeach
                        </tr>
                        <tr><td>5</td><td>{{ SPAL\Encuesta::$items[5] }}</td>
                        @foreach($ipa4 as $p4)
                            <td class="text-center"><b>{{ $p4 }}</b></td><td class="text-center"><small><?php printf("%.1f",$p4 * 100 / $tea); ?></small></td>
                        @endforeach
                        </tr>
                   
                        <tr>
                            <th class="info" colspan="14">Examen nacional</th>
                        </tr>
                        <tr><td>6</td><td>{{ SPAL\Encuesta::$items[6] }}</td>
                        @foreach($en1 as $e1)
                            <td class="text-center"><b>{{ $e1 }}</b></td><td class="text-center"><small><?php printf("%.1f",$e1 * 100 / $tea); ?></small></td>
                        @endforeach
                        </tr>
                        <tr><td>7</td><td>{{ SPAL\Encuesta::$items[7] }}</td>
                        @foreach($en2 as $e2)
                            <td class="text-center"><b>{{ $e2 }}</b></td><td class="text-center"><small><?php printf("%.1f",$e2 * 100 / $tea); ?></small></td>
                        @endforeach
                        </tr>
                        <tr>
                            <th class="info" colspan="14">Preguntas abiertas</th>
                        </tr>
                    </tbody>
                </table>                                        
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">                             
                        <h5 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          1. {{ SPAL\Encuesta::$items[8] }} <span class="caret"></span> 
                        </a></h5>                          
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body" style="max-height: 300px; overflow: auto;">
                        <ol>
                        @foreach($pa1 as $p1)
                            <li>{{ $p1->pa1 }}</li>
                        @endforeach
                        </ol>
                      </div>
                    </div>
                  </div>                    
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingDos">                             
                        <h5 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseDos" aria-expanded="true" aria-controls="collapseDos">
                          2. {{ SPAL\Encuesta::$items[9] }} <span class="caret"></span> 
                        </a></h5>                          
                    </div>
                    <div id="collapseDos" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingDos">
                      <div class="panel-body" style="max-height: 300px; overflow: auto;">
                        <ol>
                        @foreach($pa2 as $p2)
                            <li>{{ $p2->pa2 }}</li>
                        @endforeach
                        </ol>
                      </div>
                    </div>
                  </div>                    
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTres">                             
                        <h5 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTres" aria-expanded="true" aria-controls="collapseTres">
                          3. {{ SPAL\Encuesta::$items[10] }} <span class="caret"></span> 
                        </a></h5>                          
                    </div>
                    <div id="collapseTres" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTres">
                      <div class="panel-body" style="max-height: 300px; overflow: auto;">
                        <ol>
                        @foreach($pa3 as $p3)
                            <li>{{ $p3->pa3 }}</li>
                        @endforeach
                        </ol>
                      </div>
                    </div>
                  </div>                    
                </div>

            @else

                <div class="alert alert-warning">
                    <h3>No sa han aplicado encuestas para el plantel y el programa seleccionados</h3>
                </div>

            @endif
            
        </div>
    </div>
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


        $('[data-toggle="tooltip"]').tooltip();

        $(".plant").change(function(){
            $("#id_programa").val('%%');
            
            if($(".plant").val() === '%%'){
                $("#id_programa").attr("disabled",true);
            }else{
                $("#id_programa").children().css('display','inherit');
                $("#id_programa").children().not("."+$("#plant").val()).css('display','none');
                $("#id_programa").attr("disabled",false);
                console.log("que pasa?");
            }
        });

        $(".enviar").click(function(){
            var plant = $("#plant").val() != null ? '/'+$("#plant").val() : '';
            var carr  = $("#id_programa").val() != null ? '/'+$("#id_programa").val() : '';
            window.location.href='{{ url('/resultados/detallados') }}'+plant+carr;//$("#plant").val()+'/'+$("#id_programa").val();
        });

        $("#id_programa").children().css('display','inherit');
        $("#id_programa").children().not("."+$("#plant").val()).css('display','none');
        $("#id_programa").attr("disabled",false);



    });
</script>

@endsection
