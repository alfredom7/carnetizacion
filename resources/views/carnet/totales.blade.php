<table border="" style="font-family:sans-serif; width:100%; text-align:center; ">
	<tr>
		<td><img src="img/unermb-logo2.jpg" style="width:250px;"></td>
		<td width="50%"><p><b>Republica Bolivariana de Venezuela<br>
		Universidad Nacional Experimental<br>
		"Rafael Maria Baralt"</b></p></td>
		<td><img src="img/informatica-logo2.jpg" style="width:250px;"></td>
	</tr>
</table><br><br>			
			<?php
			$desde3 = new DateTime($desde2);
			$hasta3 = new DateTime($hasta2);
			?>
<table border="1" style="border-collapse:collapse; font-family:sans-serif; font-size:14px; width:100% ">
	<thead>
	<tr>
		<th colspan="5">Reporte del Total de Carnets Generados al Personal Administrativo, Docente y Obrero de Nuestra Institucion.</th>
	</tr>
	</thead>
	<tbody>
		<tr>
			<th>Administrativo</th>
			<th>Docente</th>
			<th>Obrero</th>
			<th>Fecha desde</th>
			<th>Fecha hasta</th>	
		</tr>
		<tr style="text-align:center;">
			<td>{{$totaladm}}</td>
			<td>{{$totaldoc}}</td>
			<td>{{$totalobr}}</td>
			<td>{{$desde3->format('d-m-Y')}}</td>
			<td>{{$hasta3->format('d-m-Y')}}</td>
		</tr>
		<tr style="text-align:center;">
			<td><b>Total de Impresos en PVC</b></td>
			<td>{{$impresospvc}}</td>
			<td><b>Total de Impresos en Hoja</b></td>
			<td>{{$impresoshoja}}</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="5">&nbsp;</td>
		</tr>
		<tr>
			<th colspan="5">Total de Carnets Impresos: {{$totalcuenta}}</th>
		</tr>
	</tfoot>
</table>