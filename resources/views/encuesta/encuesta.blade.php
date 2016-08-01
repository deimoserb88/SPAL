@extends('layouts.main')

@section('content')

<div class="container">

	<div class="panel panel-default" style="margin: 0 auto 20px; height: auto; border:0; box-shadow:none;">
		<div class="panel-body">
			<div class="col-md-10 col-md-offset-1" style="border-bottom: 1px solid #CCC;">
				<h4><b>Instrucciones</b></h4>
				En las siguientes preguntas selecciona la respuesta que consideres adecuada de acuerdo al siguiente criterio:
				<br>
				<ol class="list-group" style="width: 30%; margin-top: 10px;">
					<li class="list-group-item"><span class="badge alert-info">1</span>Totalmente satisfecho</li>
					<li class="list-group-item"><span class="badge alert-info">2</span>Satisfecho</li>
					<li class="list-group-item"><span class="badge alert-info">3</span>Medianamente satisfecho</li>
					<li class="list-group-item"><span class="badge alert-info">4</span>Insatisfecho</li>
					<li class="list-group-item"><span class="badge alert-info">5</span>Totalmente insatisfecho</li>
					<li class="list-group-item"><span class="badge">6</span>No sé / No aplica</li>
				</ol>
			</div>

			<div class="col-md-10 col-md-offset-1">
			{!! Form::open(array('url'=>'encuesta/guardar','method'=>'post')) !!}			
			{!! Form::hidden('plant',$datos->plant) !!}
			{!! Form::hidden('id_programa',$datos->id_programa) !!}
				<h4>Menciona qué tan satisfecho estás con los siguientes aspectos:</h4>
				<div class="panel panel-success">
					<div class="panel-heading">INFORMACIÓN GENERAL</div>
					<div class="panel-body">
						<table class="table table-hover" style="margin:0;">
							<tbody>
								<tr>
							    	<th style="width: 60%;">1. Información contenida en la convocatoria general</th>
							    	<td><input type="radio" name="gene1" id="gene11" value="1" required="required"> <span class="badge alert-info">1</span></td>
							      	<td><input type="radio" name="gene1" id="gene12" value="2" required="required"> <span class="badge alert-info">2</span></td>
							      	<td><input type="radio" name="gene1" id="gene13" value="3" required="required"> <span class="badge alert-info">3</span></td>
							      	<td><input type="radio" name="gene1" id="gene14" value="4" required="required"> <span class="badge alert-info">4</span></td>
							      	<td><input type="radio" name="gene1" id="gene15" value="5" required="required"> <span class="badge alert-info">5</span></td>
							      	<td><input type="radio" name="gene1" id="gene16" value="6" required="required"> <span class="badge">6</span></td>
								</tr>
								<tr>
							    	<th>2. Información contenida en la convocatoria de la carrera a la que aspiraste</th>
							    	<td><input type="radio" name="gene2" id="gene21" value="1" required="required"> <span class="badge alert-info">1</span></td>
							      	<td><input type="radio" name="gene2" id="gene22" value="2" required="required"> <span class="badge alert-info">2</span></td>
							      	<td><input type="radio" name="gene2" id="gene23" value="3" required="required"> <span class="badge alert-info">3</span></td>
							      	<td><input type="radio" name="gene2" id="gene24" value="4" required="required"> <span class="badge alert-info">4</span></td>
							      	<td><input type="radio" name="gene2" id="gene25" value="5" required="required"> <span class="badge alert-info">5</span></td>
							      	<td><input type="radio" name="gene2" id="gene26" value="6" required="required"> <span class="badge">6</span></td>
								</tr>
								<tr>
							    	<th><p style="margin-left: 15px;text-indent: -15px;">3. Información que el plantel te proporcionó sobre la(s) carrera(s) que ofrece, antes de inscribirte al proceso de admisión</p></th>
							    	<td><input type="radio" name="gene3" id="gene31" value="1" required="required"> <span class="badge alert-info">1</span></td>
							      	<td><input type="radio" name="gene3" id="gene32" value="2" required="required"> <span class="badge alert-info">2</span></td>
							      	<td><input type="radio" name="gene3" id="gene33" value="3" required="required"> <span class="badge alert-info">3</span></td>
							      	<td><input type="radio" name="gene3" id="gene34" value="4" required="required"> <span class="badge alert-info">4</span></td>
							      	<td><input type="radio" name="gene3" id="gene35" value="5" required="required"> <span class="badge alert-info">5</span></td>
							      	<td><input type="radio" name="gene3" id="gene36" value="6" required="required"> <span class="badge">6</span></td>
								</tr>
						    </tbody>
						</table>

					</div>
				</div>
				<div class="panel panel-success">
					<div class="panel-heading">INSCRIPCIONES AL PROCESO DE ADMISIÓN</div>
					<div class="panel-body">
						<table class="table table-hover" style="margin:0;">
							<tbody>
								<tr>
							    	<th style="width: 60%;"><p style="margin-left: 15px;text-indent: -15px;">4. Procedimiento para inscribirte al proceso de admisión (llenado de ficha, pago en el banco, etc.)</p></th>
							    	<td><input type="radio" name="ipa1" id="ipa11" value="1" required="required"> <span class="badge alert-info">1</span></td>
							      	<td><input type="radio" name="ipa1" id="ipa12" value="2" required="required"> <span class="badge alert-info">2</span></td>
							      	<td><input type="radio" name="ipa1" id="ipa13" value="3" required="required"> <span class="badge alert-info">3</span></td>
							      	<td><input type="radio" name="ipa1" id="ipa14" value="4" required="required"> <span class="badge alert-info">4</span></td>
							      	<td><input type="radio" name="ipa1" id="ipa15" value="5" required="required"> <span class="badge alert-info">5</span></td>
							      	<td><input type="radio" name="ipa1" id="ipa16" value="6" required="required"> <span class="badge">6</span></td>
								</tr>
								<tr>
							    	<th style="width: 60%;"><p style="margin-left: 15px;text-indent: -15px;">5. Atención del personal administrativo durante el proceso de admisión</p></th>
							    	<td><input type="radio" name="ipa2" id="ipa21" value="1" required="required"> <span class="badge alert-info">1</span></td>
							      	<td><input type="radio" name="ipa2" id="ipa22" value="2" required="required"> <span class="badge alert-info">2</span></td>
							      	<td><input type="radio" name="ipa2" id="ipa23" value="3" required="required"> <span class="badge alert-info">3</span></td>
							      	<td><input type="radio" name="ipa2" id="ipa24" value="4" required="required"> <span class="badge alert-info">4</span></td>
							      	<td><input type="radio" name="ipa2" id="ipa25" value="5" required="required"> <span class="badge alert-info">5</span></td>
							      	<td><input type="radio" name="ipa2" id="ipa16" value="6" required="required"> <span class="badge">6</span></td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
				<div class="panel panel-success">
					<div class="panel-heading">EXAMEN NACIONAL</div>
					<div class="panel-body">
						<table class="table table-hover" style="margin:0;">
							<tbody>
								<tr>
							    	<th style="width: 60%;"><p style="margin-left: 15px;text-indent: -15px;">6. Procedimiento para el llenado de la solicitud electrónica del examen nacional (EXANI II)</p></th>
							    	<td><input type="radio" name="en1" id="en11" value="1" required="required"> <span class="badge alert-info">1</span></td>
							      	<td><input type="radio" name="en1" id="en12" value="2" required="required"> <span class="badge alert-info">2</span></td>
							      	<td><input type="radio" name="en1" id="en13" value="3" required="required"> <span class="badge alert-info">3</span></td>
							      	<td><input type="radio" name="en1" id="en14" value="4" required="required"> <span class="badge alert-info">4</span></td>
							      	<td><input type="radio" name="en1" id="en15" value="5" required="required"> <span class="badge alert-info">5</span></td>
							      	<td><input type="radio" name="en1" id="en16" value="6" required="required"> <span class="badge">6</span></td>
								</tr>
								<tr>
							    	<th style="width: 60%;"><p style="margin-left: 15px;text-indent: -15px;">7. Atención recibida durante la aplicación del examen nacional (EXANI II)</p></th>
							    	<td><input type="radio" name="en2" id="en21" value="1" required="required"> <span class="badge alert-info">1</span></td>
							      	<td><input type="radio" name="en2" id="en22" value="2" required="required"> <span class="badge alert-info">2</span></td>
							      	<td><input type="radio" name="en2" id="en23" value="3" required="required"> <span class="badge alert-info">3</span></td>
							      	<td><input type="radio" name="en2" id="en24" value="4" required="required"> <span class="badge alert-info">4</span></td>
							      	<td><input type="radio" name="en2" id="en25" value="5" required="required"> <span class="badge alert-info">5</span></td>
							      	<td><input type="radio" name="en2" id="en26" value="6" required="required"> <span class="badge">6</span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel panel-success">
					<div class="panel-heading">CONTESTA LAS SIGUIENTES PREGUNTAS</div>
					<div class="panel-body">
						<div class="form-group">
					      <label for="pa1"><p style="margin-left: 15px;text-indent: -15px;">1. ¿Qué opinas de los criterios y requisitos del proceso de admisión (promedio de bachillerato, examen nacional, documentos solicitados)?</p></label>
					        <textarea class="form-control" rows="3" name="pa1"></textarea>
					    </div>
						<div class="form-group">
					      <label for="pa2"><p style="margin-left: 15px;text-indent: -15px;">2. Si participaste en alguna actividad de información u orientación durante el proceso, ¿a cuál asististe? ¿Qué te pareció?</p></label>
					        <textarea class="form-control" rows="3" name="pa2"></textarea>
					    </div>
						<div class="form-group">
					      <label for="pa3"><p style="margin-left: 15px;text-indent: -15px;">3. ¿Qué otras actividades de información u orientación sugieres para el siguiente proceso?</p></label>
					        <textarea class="form-control" rows="3" name="pa3"></textarea>
					    </div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">COMENTARIOS</div>
					<div class="panel-body">
						<div class="form-group">
					        <textarea class="form-control" rows="5" name="coment"></textarea>
					    </div>
					</div>
				</div>

					<button class="btn btn-success btn-lg btn-block" type="submit">Enviar <i class="fa fa-send" aria-hidden="true"></i></button>

			{!! Form::close() !!}



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
