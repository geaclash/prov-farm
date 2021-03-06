@extends('app.admin')

@section('contenido')


    <div class="container">
        <div class="row">
            {!! Form::open(['url'=>'/ingreso','method'=>'GET','autocomplete'=>'off','role'=>'search']); !!}
                    <div class="col-sm-11">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="buscar" class="form-control" placeholder="Buscar Ej: 468029" value="{{$buscar}}">
                                <span class="input-group-btn"><button class="btn btn-primary">Buscar</button></span>
                            </div>
                        </div>
                    </div>

                
            {!! Form::close() !!}
        </div>
    </div>
    
    @if(count($ingresos) <1 && strlen($buscar)>0)
    <h3>No se encontraron ingresos para {{$buscar}}</h3>
    @else
    @if(strlen($buscar)>0) <h3>Resultados de la búsqueda de: {{$buscar}}</h3>@endif
    <h1>Ingresos de Artículos <a href="{{action('IngresoController@create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</a></h1>

    <table class="table table-bordered table-condensed table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Número de Factura</th>
            <th>Fecha y Hora</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($ingresos as $fila) 

                <tr>
                    <td>{{$fila->id}}</td>
                    <td>{{$fila->nro_factura}}</td>
                    <td>{{$fila->fecha_hora}}</td>
                    
                    <td>
                        <a class="btn btn-primary" href="{{action('IngresoController@show',['id'=>$fila->id])}}">Ver</a>
                        <a class="btn btn-danger" onclick="$('#modal-delete-{{$fila->id}}').modal('show')">Eliminar</a>
                    </td>

                </tr>

                @include('ingreso.modal')

            @endforeach

        </tbody>

    </table>
    @endif
@endsection