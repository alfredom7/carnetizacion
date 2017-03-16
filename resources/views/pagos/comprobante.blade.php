
<table style="font-family:sans-serif; font-size: 15px; border-collapse:collapse" border="">
	<tr>
		<td><img src="img/unermb-logo2.jpg" style="width:180px;"></td>
		<th style="width:300px;">Comprobante de Pago de Carnet <p style="font-size:12px;">(UNIVERSIDAD EXPERIMENTAL "RAFAEL MARIA BARALT")</p></th>
		<td><img src="img/informatica-logo2.jpg" style="width:180px;"></td>
	</tr>
</table>
<table width="100%" border="1" style="border-collapse:collapse; font-family:sans-serif">
	<tbody style="font-size:15px;">
		@foreach($comprobante as $c)
	  <tr>
	    <th>#</th>
	    <th colspan="2">{{$c->id}}</th>
	  </tr>
	  <tr>
	    <th>Nombre</th>
	    <th colspan="2">{{$persona[0]->nomper}}, {{$persona[0]->apeper}}</th>
	  </tr>
	  <tr>
	    <th>N° Cedula</th>
	    <th colspan="2">{{$c->cedula}}</th>
	  </tr>
	  <tr>
	    <th>Monto</th>
	    <th colspan="2">{{$c->monto}} BsF.</th>
	  </tr>
	  <tr>
	    <th>N° Transaccion</th>
	    <th colspan="2">{{$c->numero_transaccion}}</th>
	  </tr>
	  <tr>
	    <th>Banco</th>
	    <th colspan="2">{{$c->banco}}</th>
	  </tr>
	  <tr>
	    <th>Cuenta Bancaria</th>
	    <th colspan="2">{{$c->banco_cuenta}}</th>
	  </tr>
	  <tr>
	    <th>Fecha de Pago</th>
	    <th colspan="2">{{$c->created_at->format('d-m-Y')}}</th>
	  </tr>
	    @endforeach
	</tbody>
</table>




