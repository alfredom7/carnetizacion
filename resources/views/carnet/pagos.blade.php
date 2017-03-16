@extends('base')
@section('contenido')

                                    <!--FORMULARIO DE REGISTRO DE PAGOS-->

                                    <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>                                        </div><!-- panel-btns -->
                                        <h4 class="panel-title">Registrar Pago de Carnet</h4>
                                    </div><!-- panel-heading -->
                                    
                                    <div class="panel-body nopadding">
                                        {!! Form::open(['method' => 'POST', 'url' => 'registrarpago']) !!}
                                            
                    						<table class="table table-striped mb30">
                    							<thead>
                    								<tr>
                    									<th>N° de Cedula</th>
                    									<th>Banco</th>
                    									<th>Monto</th>
                    									<th>Transaccíon</th>
                    								</tr>
                    							</thead>
                    							<tbody>
                    								<tr>
                    									<td><input name="cedula" type="text" placeholder="Cedula" title="" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" data-original-title="Ingrese el numero de Cedula" required></td>
                    									<td>
															<select name="banco" id="select-basic" data-placeholder="Selecciona el Banco..." class="width300 select2-offscreen" tabindex="-1" title="">
														        <option value=""></option>
														        <optgroup label="Banco Occidental de Descuento">
														            <option value=""></option>
														            @foreach($bbod as $bbod)
														            <option value="{{$bbod->ctaban}}">{{$bbod->ctaban}}</option>
														            @endforeach
														        </optgroup>
														        <optgroup label="Banco de Venezuela">
														            <option value=""></option>
														            @foreach($bven as $bven)
														            <option value="{{$bven->ctaban}}">{{$bven->ctaban}}</option>
														            @endforeach
														        </optgroup>
														        <optgroup label="Banco Bicentenario">
														            <option value=""></option>
														            @foreach($bbic as $bbic)
														            <option value="{{$bbic->ctaban}}">{{$bbic->ctaban}}</option>
														            @endforeach
														        </optgroup>
														        <optgroup label="Banco Provincial">
														            <option value=""></option>
														            @foreach($bpro as $bpro)
														            <option value="{{$bpro->ctaban}}">{{$bpro->ctaban}}</option>
														            @endforeach
														        </optgroup>
														        <optgroup label="Banco Mercantil">
														            <option value=""></option>
														            @foreach($bmer as $bmer)
														            <option value="{{$bmer->ctaban}}">{{$bmer->ctaban}}</option>
														            @endforeach
														        </optgroup>
														        <optgroup label="Banesco">
														            <option value=""></option>
														            @foreach($bban as $bban)
														            <option value="{{$bban->ctaban}}">{{$bban->ctaban}}</option>
														            @endforeach
														        </optgroup>
														    </select>

                    									</td>
                    									<td><input name="monto" type="text" placeholder="Monto" title="" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" data-original-title="Ingrese el monto de la operacion" required></td>
                    									<td><input name="transaccion" type="text" placeholder="N° de Transaccion" title="" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" data-original-title="Numero de Transaccion Bancaria" required></td>
                    								</tr>
                    							</tbody>
                    						</table>
                    						<br><center>
                    						<button type="submit" class="btn btn-success btn-bordered">Registrar Pago</button>
                                        	</center></br>
                                        {!! Form::close() !!}          
                                    </div><!-- panel-body -->       
                                </div><!-- panel -->


							<div class="col-sm-6 col-md-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="panel-btns" style="display: none;">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                                                                    </div><!-- panel-btns -->
                                        <h3 class="panel-title">Ultimos Registros de Pagos de Carnets</h3>                                      
                                    </div>
                                    <div class="panel-body">                                                            
                                    <!--TABLA DE REGISTRO DE PAGOS-->
												<div class="col-md-12">
					                              <div class="table-responsive">
					                              <table class="table table-striped mb30">
					                                <thead>
					                                  <tr>
					                                    <th>ID</th>
					                                    <th>Cedula</th>
					                                    <th>Banco</th>
					                                    <th>Cuenta Bancaria</th>
					                                    <th>Monto</th>
					                                    <th>N° Transaccion</th>
					                                    <th>Fecha</th>
					                                  </tr>
					                                </thead>
					                                <tbody>
					                                @foreach($registros as $r)
					                                  <tr>
					                                    <td>{{$r->id}}</td>
					                                    <td>{{$r->cedula}}</td>
					                                    <td>{{$r->bancos->nomban}}</td>
					                                    <td>{{$r->banco_cuenta}}</td>
					                                    <td>{{$r->monto}}</td>
					                                    <td>{{$r->numero_transaccion}}</td>
					                                    <td>{{$r->created_at}}</td>
					                                  </tr>
					                                  @endforeach
					                                </tbody>
					                              </table>
					                              </div><!-- table-responsive -->
					                            </div>
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div>
				    

@endsection
@yield('scripts')
<script language="JavaScript" type="text/JavaScript">
    $(document).ready(function(){
        $("#banco").change(function(event){
            var id = $("#banco").find(':selected').val();
            $("#cuenta").load('genera-select.php?id='+id);
        });
    });
</script>