@extends('base')
@section('contenido')
<div class="contentpanel">
                        
                        <div class="row row-stat">
                            <div class="col-md-3">
                                <div class="panel panel-success-alt noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-icon"><i class="fa fa-users"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin"><b>Total de Carnets Generados</b></h5>
                                            <h1 class="mt5">{{$total}}</h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin">Hoy</h5>
                                                <h4 class="nomargin">{{$tth}}</h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin">Este Mes</h5>
                                                <h4 class="nomargin">{{$todosmes}}</h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                            
                            <div class="col-md-3">
                                <div class="panel panel-primary noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-icon"><i class="fa fa-folder-open"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin"><b>Carnets a Personal Administrativo</b></h5>
                                            <h1 class="mt5">{{$totaladm}}</h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin">Hoy</h5>
                                                <h4 class="nomargin">{{$tah}}</h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin">Este Mes</h5>
                                                <h4 class="nomargin">{{$tames}}</h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                            
                            <div class="col-md-3">
                                <div class="panel panel-danger noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-icon"><i class="fa fa-pencil"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin"><b>Carnets a Personal Docente</b></h5>
                                            <h1 class="mt5">{{$totaldoc}}</h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin">Hoy</h5>
                                                <h4 class="nomargin">{{$tdh}}</h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin">Este Mes</h5>
                                                <h4 class="nomargin">{{$tdmes}}</h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                            <div class="col-md-3">
                                <div class="panel panel-dark noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-icon"><i class="fa fa-truck"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin"><b>Carnets a Personal Obrero</b></h5>
                                            <h1 class="mt5">{{$totalobr}}</h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                            <div class="pull-left">
                                                <h5 class="md-title nomargin">Hoy</h5>
                                                <h4 class="nomargin">{{$toh}}</h4>
                                            </div>
                                            <div class="pull-right">
                                                <h5 class="md-title nomargin">Este Mes</h5>
                                                <h4 class="nomargin">{{$tomes}}</h4>
                                            </div>
                                        </div>
                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-md-4 -->
                        </div><!-- row -->
                        

                        <div class="col-sm-6 col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="panel-btns" style="display: none;">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                        </div><!-- panel-btns -->
                                        <h3 class="panel-title"><b>Ultimos Carnets Generados</b></h3>
                                    </div>
                                    <div class="panel-body">

										<div class="col-md-12">
			                                <div class="table-responsive">
			                                    <table class="table table-info mb30">
			                                        <thead>
			                                          <tr>
			                                            <th>#</th>
			                                            <th>Nombre</th>
			                                            <th>Cedula</th>
			                                            <th>Tipo de Personal</th>
			                                            <th>Fecha de Creacion</th>
			                                          </tr>
			                                        </thead>
			                                        <tbody>
<?php
$contador=1;
?>
			                                        @foreach($ultimos20 as $u20)
			                                          <tr>
			                                            <td>{{$contador++}}</td>
			                                            <td>{{$u20->nombre}}, {{$u20->apellido}}</td>
			                                            <td>{{$u20->cedula}}</td>
			                                            <td>{{$u20->tipopersonal}}</td>
			                                            <td>{{$u20->created_at->format('d-m-Y')}}</td>
			                                          </tr>
			                                         @endforeach
			                                        </tbody>
			                                    </table>
			                                </div><!-- table-responsive -->
			                            </div>
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div>

                    </div>
@endsection