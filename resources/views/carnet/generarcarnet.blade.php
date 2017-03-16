<style type="text/css">
.rotar {
-webkit-transform: rotate(-90deg);
transform: rotate(-90deg);
}       
</style>

@if($consulta[0]->tipper == 'ADMINISTRATIVO')
<div style="position:absolute;">
	<img style="height:321.25984252px; width:200.31496063px;" src="img/carnets/carnet_administrativos.jpg">
</div>
@elseif($consulta[0]->tipper == 'DOCENTE')
<div style="position:absolute;">
	<img style="height:321.25984252px; width:200.31496063px;" src="img/carnets/carnet_docentes.jpg">
</div>
@elseif($consulta[0]->tipper == 'OBRERO')
<div style="position:absolute;">
	<img style="height:321.25984252px; width:200.31496063px;" src="img/carnets/carnet_obreros.jpg">
</div>
@else
NADA
@endif
<!--DIV CONTENEDOR DE TODO-->
<div style="position:relative; font-family: 'Trebuchet MS', 'Lucida Grande', 
'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif; font-size: 11px;
margin-top:12.7px; margin-left:-27px;">

<!--TABLA CONTENEDORA DEL CODIGO DE BARRA Y LA FOTO DEL CARNET-->
	<table style="text-align:right;" border="">
  <tr>
  	<td height="180px;" width="0px;"><div class="rotar font-face" style="height:10px; position:relative; margin-top:60px; margin-left:8px;">{!! DNS1D::getBarcodeHTML("1234", "C39",0.986,20)!!}</div></td>
  	<td width="0px;" colspan="2">
  		<div style="margin-top:73px; margin-left:-5px;"><img style="width:100px; height:110px;" src="img/foto.png"></div>
  	</td>
  </tr>
  </table>

  <!--TABLA CONTENEDORA DE LOS DATOS BASICOS NOMBRE, APELLIDO Y CEDULA--> 
  <table border="" width="209px;" style="text-align:right; font-size:10px;">
  <tr>
    <td colspan="3"><b>{{$consulta[0]->nomper}},</b></td>
  </tr>
  <tr>
    <td colspan="3"><b>{{$consulta[0]->apeper}}</b></td>
  </tr>
  <tr>
  	<td colspan="3">{{$consulta[0]->cedper}}</td>
  </tr>
</table>
<!--TABLA CONTENEDORA DE TIPO DE PERSONAL, CARGO, DIRECCION A LA QUE ESTA ADSCRITO-->
<table style="text-align:right; margin-left: -25px; margin-top:-3px; font-size:10px;" width="220px;" border="">
  <tr>
  @if($consulta[0]->tipper == 'ADMINISTRATIVO')
    <td style="line-height:0.8em;">Personal Administrativo</td>
  @elseif($consulta[0]->tipper == 'DOCENTE')
    <td style="line-height:0.6em;">Personal Docente</td>
  @elseif($consulta[0]->tipper == 'OBRERO')
    <td style="line-height:0.6em;">Personal Obrero</td>
  @else
  NADA
  @endif
  </tr>
  <tr>
    <td style="line-height:0.8em;"><b>{!! $consulta[0]->cargo !!}</b></td>
  </tr>
  <tr>
    <td style="line-height:1em; text-align:right;">{!! $selectdir !!}</td>
  </tr>
</table>
</div>

