@extends('base')
@section('contenido')

<style type="text/css">
	.tg th{
		text-align: center;
	}
</style>
                    
                    <div class="contentpanel">                       	
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="panel-btns" style="display: none;">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                        </div><!-- panel-btns -->
                                        <h3 class="panel-title">Reporte de Carnets Generados</h3>
                                    </div>
                                    <div class="panel-body">
                                    <br>


                                    {!! Form::open(['method' => 'POST', 'url' => 'generarreporte']) !!}

										<table style="text-align:left; font-weight:bold">
											<tr>
												<td width="250px;">Tipo de Personal</th>
												<td width="200px">Desde:</th>
												<td width="200px">Hasta:</th>
												<td width="150px">Generar Totales?</th>
											</tr>
											<tr>
												<td>
										            <select class="form-control" style="width:200px" name="tipopersonal" required>
										            	<option value="">Seleccione...</option>
										            	<option value="TODOS">Todos</option>
										            	<option value="ADMINISTRATIVO">Administrativos</option>
										            	<option value="DOCENTE">Docentes</option>
										            	<option value="OBRERO">Obreros</option>
										            </select>                                    
												</td>
												<td>
													<div class="input-group">
													<input type="text" class="form-control" placeholder="dia-mes-año" id="datepicker" name="desde" required>
													</div>
												</td>
												<td>
													<div class="input-group">
													<input type="text" class="form-control" placeholder="dia-mes-año" id="datepicker1" name="hasta" required>
													</div>
												</td>

												<td style="text-align:center;">
													<div class="ckbox ckbox-primary">
													<input type="checkbox" value="1" id="checkboxPrimary" name="listado">
													<label for="checkboxPrimary"></label>
													</div>
												</td>
											</tr>
										</table>
    												
    												

    												<br />

										<button class="btn btn-primary btn-metro" type="submit">Generar Reporte</button>

											<br>
                                        {!! Form::close() !!}
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-sm-6 -->             
                        </div><!-- row -->

                    </div><!-- contentpanel -->
                    

@endsection