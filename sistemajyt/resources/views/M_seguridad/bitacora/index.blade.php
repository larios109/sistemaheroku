@extends('adminlte::page')



@section('css')
<!-- <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"> -->
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('title', '| Bitacora')
@section('content_header')
    <h1 class="text-center">Bitacora</h1>
    <hr class="bg-dark border-1 border-top border-dark">
@stop

@section('content')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

@can ('crear->bitacora')
<a 
    href="{{route('bitacora.create')}}"
    class="btn btn-outline-info text-center btn-block">
    <spam>Ingresar Registro</spam> <i class="fas fa-plus-square"></i>
</a>
@endcan

@if (session('info'))
    <div class="alert alert-success alert-dismissible mt-2 text-dark" role="alert">
        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        <strong>{{session('info')}}</strong>
    </div>
@endif

<div class="table-responsive-sm mt-5">
    <table id="tablabitacora" class="table table-stripped table-bordered table-condensed table-hover">
        <thead class=thead-dark>
            <tr>
                <th class="text-center">Codigo Operacion</th>
                <th class="text-center">Usuario</th>
                <th class="text-center">Fecha Operacion</th>
                <th class="text-center">Codigo Tipo operacion</th>
                <th class="text-center">Referencia Operacion</th>
                <th class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp
            @foreach($registrooperacion as $registro)
                <tr>
                    <td class="text-center">{{$i}}</td>
                    <td class="text-center">{{$registro["name"]}}</td>
                    <td class="text-center">{{$registro["fecha_operacion"]}}</td>
                    <td class="text-center">{{$registro["cod_tipo_operacion"]}}</td>
                    <td class="text-center">{{$registro["referencia_operacion"]}}</td>
                    <td class="text-center">
                        @can ('editar->bitacora')
                        <form action="{{route('bitacora.destroy',$registro["cod_operacion"])}}"  method='POST' >
                            <a href="{{route('bitacora.edit',$registro["cod_operacion"])}}" class="btn btn-warning btm-sm fa fa-edit"></a>
                            @can ('borrar->bitacora')
                            <button type="submit" class="btn btn-danger btm-sm fa fa-times-circle">   
                             @csrf
                             @method('DELETE')
                            </button>
                            @endcan
                        </form>
                        @endcan
                </td>
                </tr>
            @php $i++; @endphp
            @endforeach
        </tbody>
    </table>
</div>

@stop

@section('css')

@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablabitacora').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            // dom: 'Blfrtip',
            dom: '<"pt-2 row" <"col-xl mt-2"l><"col-xl text-center"B><"col-xl text-right mt-2 buscar"f>> <"row"rti<"col"><p>>',
            buttons: [
                {
                    extend: 'pdf',
                    className: 'btn btn-danger glyphicon glyphicon-duplicate',
                   
                }, 
                {
                    extend: 'print',
                    text: 'Imprimir',
                    className: 'btn btn-secondary glyphicon glyphicon-duplicate'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-success glyphicon glyphicon-duplicate'
                }
            ]
        });
    });
</script>
</script>
@stop