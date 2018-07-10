@extends('control.index')

@section('content3')
    
    <div class="d-flex justify-content-between align-items-end">
        
        @if($titulo == "Ingresos por " . $tipo . " del día")
            <h1 class="mt-2 mb-3">{{ $titulo }}</h1>
            <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample">
                Nuevo ingreso
            </button>
            <button class="btn btn-info" data-toggle="collapse" data-target="#collapseExample2">
                Historial
            </button>
        @else
            <h2 class="mt-2 mb-3">{{ $titulo }}</h2>
            <a href="/admin/control/ingresos/{{$tipo}}/" class="btn btn-primary">Volver</a>
            <button class="btn btn-info" data-toggle="collapse" data-target="#collapseExample2">
                Historial
            </button>
        @endif
        
        <div class="collapse indent" id="collapseExample">
            <div class="card card-body">
                <p>
                    <form method="POST" action="/admin/control/ingresos/{{$tipo}}">
                        {!!csrf_field()!!}
                        
                        <div class="form-group col-md-3" style="padding-left: 0px;">
                            <label>Atendió</label>
                            <select class="form-control" name="id_empleado" value="{{ old('id_empleado') }}">
                                @foreach($empleados as $empleado)
                                    @if($empleado->activo == 1)
                                    <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                                
                        <div class="form-group col-md-3" style="padding-left: 0px;">
                            <label>Cliente</label>
                            <select class="form-control" name="id_cliente" value="{{ old('id_cliente') }}">
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" class="form-control" name="id_type" value="{{ $id_type }}">
                        <input type="hidden" class="form-control" name="deHoy" value=1>
                        <input type="hidden" class="form-control" name="completada" value=0>
                        <input type="hidden" class="form-control" name="monto" value=0>
                        <input type="hidden" class="form-control" name="descuento" value=0>
                        
                        <div class="form-group col-md-2" style="padding-left: 0px;">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success form-control">Agregar</button>
                        </div>
                    </form>
                </p>
            </div>
        </div>
            
        <div class="collapse indent" id="collapseExample2">
            <div class="card card-body">
                <p>
                    <form class="form-inline" method="POST" action="{{ url('/admin/control/ingresos/' . $tipo . '/historial') }}">
                        {!!csrf_field()!!}
                        <div class="form-group">
                            <label> Desde </label>
                            <input required type="date" class="form-control" name="desde">
                        </div>
                        <div class="form-group">
                            <label> Hasta </label>
                            <input required type="date" class="form-control" name="hasta" value="{{ date("Y-m-d") }}">
                        </div>
                                    
                        <button type="submit" class="btn btn-success">Buscar</button>
                        
                    </form>
                </p>
            </div>
        </div>
    </div>

    <p></p>
    
    <table class="table">
        <thead class="thead-dark"></thead>
            <tr></tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Atendió</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Ver</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>
                        @foreach($clientes as $cliente)
                            @if($cliente->id == $order->id_cliente)
                                {{$cliente->nombre}}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($empleados as $empleado)
                            @if($empleado->id == $order->id_empleado)
                                {{$empleado->nombre}}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td><b>$</b> {{ $order->monto - $order->descuento }}</td>
                    <td>{{ date('d/m/y', strtotime($order->created_at)) }}</td>
                    <td>{{ date('H:i', strtotime($order->created_at)) }} <b>hs</b></td>
                    <td><a href="/admin/control/ingresos/{{$tipo}}/{{ $order->id }}" class="btn btn-success"><span class="oi oi-eye"></span></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection