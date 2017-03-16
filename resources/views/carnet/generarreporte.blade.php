<table border="" style="font-family:sans-serif; width:100%; text-align:center; ">
	<tr>
		<td><img src="img/unermb-logo2.jpg" style="width:250px;"></td>
		<td width="50%"><p><b>Republica Bolivariana de Venezuela<br>
		Universidad Nacional Experimental<br>
		"Rafael Maria Baralt"</b></p></td>
		<td><img src="img/informatica-logo2.jpg" style="width:250px;"></td>
	</tr>
</table>			
			<?php
			$desde3 = new DateTime($desde2);
			$hasta3 = new DateTime($hasta2);
			?>
<table border="1" style="border-collapse:collapse; font-family:sans-serif; font-size:14px;">
	<thead>
	<tr>
	@if($tipopersonal=="TODOS")
		<th colspan="8">Reporte de Carnets Generados a Todo el Personal de la Institucion desde: {{$desde3->format('d-m-Y')}}, hasta: {{$hasta3->format('d-m-Y')}}.</th>
	@else
		<th colspan="8">Reporte de Carnets Generados al Personal {{$tipopersonal}} desde: {{$desde3->format('d-m-Y')}}, hasta: {{$hasta3->format('d-m-Y')}}.</th>
	@endif
	</tr>
	</thead>
	<tbody>
		<tr>
			<th>#</th>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Tipo de Personal</th>
			<th>Cargo</th>
			<th>Dependencia</th>
			<th>Fecha Creacion</th>
			<th>Usuario Creador</th>	
		</tr>
		<?php $contador=1; ?>
		@foreach($reporte as $r)
			<?php
			$date = new DateTime($r->created_at);
			?>
		<tr style="text-align:center; font-size:12px;">
			<td>{{$contador++}}</td>
			<td>{{$r->cedula}}</td>
			<td>{{$r->nombre}}, {{$r->apellido}}</td>
			<td>{{$r->tipopersonal}}</td>
			<td>{{$r->cargo}}</td>
			<td>{{$r->dependencia}}</td>
			<td>{{$date->format('d-m-Y')}}</td>
			<td>{{$r->usuario_creador}}</td>
		</tr>
		@endforeach
	</tbody>
</table>