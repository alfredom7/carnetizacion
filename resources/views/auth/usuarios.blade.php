@extends('base')
@section('contenido')

<div class="contentpanel">
                        
                        <div class="row">                           
                            <div class="col-sm-6 col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="panel-btns">
                                            <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                            <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                                        </div><!-- panel-btns -->
                                        <h3 class="panel-title">Usuarios Registrados</h3>
                                    </div>
                                    <div class="panel-body">
										<div class="col-md-12">
										<div class="table-responsive">
										<table class="table table-striped mb30">
										<thead>
										<tr>
											<th>ID</th>
											<th>Nombre de Usuario</th>
											<th>Nombre</th>
											<th>Fecha de Creacion</th>
											<th>Acciones</th>
										</tr>
										</thead>
										<tbody>
										@foreach($usuarios as $u)
										<tr>
											<td>{{$u->id}}</td>
											<td>{{$u->username}}</td>
											<td>{{$u->name}}</td>
											@if($u->created_at != '')
											<td>{{$u->created_at->format('d-m-Y')}}</td>
											@else
											<td>No tiene</td>
											@endif
											<td>.</td>
										</tr>
										@endforeach
										</tbody>
										</table>
										</div><!-- table-responsive -->
										</div>
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div><!-- col-sm-6 -->     
                        </div><!-- row -->
                    </div>
@endsection