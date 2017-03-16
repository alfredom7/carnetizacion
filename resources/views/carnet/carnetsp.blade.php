@extends('base')
@section('contenido')

                    
                    <div class="contentpanel">                       	
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="panel-btns" style="display: none;">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                        </div><!-- panel-btns -->
                                        <h3 class="panel-title">Datos del Personal</h3>
                                    </div>
                                    <div class="panel-body">
                                    <br>


                                    {!! Form::open(['method' => 'POST', 'url' => 'generarcarnet']) !!}

										<table class="" width="100%" style="text-align:left;" >
										  <tr>
										    <td><label>N° Cedula:</b></label></td>
										    <td><input type="text" name="cedula" placeholder="Numero de cedula" class="form-control" style="width:170px;"></td>
										    <td>
										    <div class="ckbox ckbox-primary">
												<input type="checkbox" value="1" id="checkboxPrimary" name="autoridad">
												<label for="checkboxPrimary">Es Autoridad?</label>
											</div>
											</td>
										    <td>
									    	<div class="ckbox ckbox-success">
                                                <input type="checkbox" id="checkboxSuccess" name="completa">
                                                <label for="checkboxSuccess">Pantalla Completa?</label>
                                        	</div>
											</td>
										  </tr>
										  <tr>
										  	<td>&nbsp;</td>
										  </tr>
										  <tr>
											<td colspan="2"><label >Dependencia o Direccion a la que esta adscrito:</label></td>
											<td colspan="4"><select class="form-control" name="selectdir" required>  
											 @include('carnet.selectdir')</select></td>
										  </tr>
										</table><br><br>
										<button class="btn btn-primary btn-metro" type="submit">Generar Carnet</button>
											<br>
                                        {!! Form::close() !!}
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-sm-6 -->             
                        </div><!-- row -->

                    </div><!-- contentpanel -->
                    

@endsection