@extends('adminlte::page')

@section('title', '| Actualizar Pago salario')

@section('content_header')
    <h1 class="text-center">Pago Salario</h1>
    <hr class="bg-dark border-1 border-top border-dark">
@stop

@section('content')
    <form action="{{route('pagosalario.update', $pagosalarioactu->cod_pago)}}" method='POST'>
        @csrf
        @method('PUT')
        <div class="card  mb-2">
            <div  class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Codigo Empleado</label>
                <select class="col-sm-7" class="form-control" id="Empleado" name="Empleado" value="{{$pagosalarioactu->name}}">
                    @foreach($users as $user)
                        {
                            <option id=".$user['Empleado']">{{$user["name"]}}</option>
                        }
                    @endforeach
                </select>
                @if ($errors->has('Empleado'))
                    <div     
                        id="Empleado-error"                                          
                        class="error text-danger pl-3"
                        for="Empleado"
                        style="display: block;">
                        <strong>{{$errors->first('Empleado')}}</strong>
                    </div>
                @endif
            </div>

            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Sueldo Bruto</label>
                 <div class="col-sm-7">
                    <input type="number" id="SueldoB" name="SueldoB" min="0" max="60000" class="form-control" placeholder="Ingrese el sueldo bruto" value="{{$pagosalarioactu->sueldo_bruto}}">
                </div>
                @if ($errors->has('SueldoB'))
                    <div               
                        id="SueldoB-error"                               
                        class="error text-danger pl-3"
                        for="SueldoB"
                        style="display: block;">
                        <strong>{{$errors->first('SueldoB')}}</strong>
                    </div>
                @endif
            </div>

            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">IHSS</label>
                 <div class="col-sm-7">
                    <input type="number" id="IHSS" name="IHSS" min="0" max="5000" class="form-control" placeholder="Ingrese el IHSS" value="{{$pagosalarioactu->IHSS}}">
                </div>
                @if ($errors->has('IHSS'))
                    <div                 
                        id="IHSS-error"                             
                        class="error text-danger pl-3"
                        for="IHSS"
                        style="display: block;">
                        <strong>{{$errors->first('IHSS')}}</strong>
                    </div>
                @endif
            </div>

            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">RAP</label>
                 <div class="col-sm-7">
                    <input type="number" id="RAP" name="RAP" class="form-control" min="0" max="5000" placeholder="Ingrese el RAP" value="{{$pagosalarioactu->RAP}}">
                </div>
                @if ($errors->has('RAP'))
                    <div          
                        id="RAP-error"                                     
                        class="error text-danger pl-3"
                        for="RAP"
                        style="display: block;">
                        <strong>{{$errors->first('RAP')}}</strong>
                    </div>
                @endif
            </div>

            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Otras deducciones</label>
                 <div class="col-sm-7">
                    <input type="number" id="deducciones" name="deducciones" min="0" max="50000" class="form-control" placeholder="Ingrese otras deducciones" value="{{$pagosalarioactu->otras_deducciones}}">
                </div>
                @if ($errors->has('deducciones'))
                    <div
                        id="deducciones-error"                                                
                        class="error text-danger pl-3"
                        for="deducciones"
                        style="display: block;">
                        <strong>{{$errors->first('deducciones')}}</strong>
                    </div>
                 @endif
            </div>

            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">vacaciones</label>
                 <div class="col-sm-7">
                    <input type="number" id="vacaciones" name="vacaciones" min="0" max="5000" class="form-control" placeholder="Ingrese las vacaciones" value="{{$pagosalarioactu->vacaciones}}">
                </div>
                @if ($errors->has('vacaciones'))
                    <div
                        id="vacaciones-error"                                              
                        class="error text-danger pl-3"
                        for="vacaciones"
                        style="display: block;">
                        <strong>{{$errors->first('vacaciones')}}</strong>
                     </div>
                @endif
            </div>

            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Descripcion vacaciones</label>
                 <div class="col-sm-7">
                    <input type="text" id="Descripcion" name="Descripcion" class="form-control" placeholder="Ingrese la Descripcion de vacaciones" value="{{$pagosalarioactu->descripcion_vacaciones}}">
                </div>
                @if ($errors->has('Descripcion'))
                    <div
                        id="Descripcion-error"                                              
                        class="error text-danger pl-3"
                        for="Descripcion"
                        style="display: block;">
                        <strong>{{$errors->first('Descripcion')}}</strong>
                     </div>
                @endif
            </div>

            <div class="row mb-3">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Sueldo</label>
                 <div class="col-sm-7">
                    <input type="number" id="Sueldo" name="Sueldo" min="0" max="60000" class="form-control" placeholder="Ingrese el Sueldo" value="{{$pagosalarioactu->salario}}">
                </div>
                @if ($errors->has('Sueldo'))
                    <div
                        id="Sueldo-error"                                              
                        class="error text-danger pl-3"
                        for="Sueldo"
                        style="display: block;">
                        <strong>{{$errors->first('Sueldo')}}</strong>
                     </div>
                @endif
            </div>

            <div class="row">
                <div class="col-sm-6 col-xs-12 mb-2">
                    <a href="{{route('pagosalario.index')}}"
                    class="btn btn-danger w-100"
                    >Cancelar <i class="fa fa-times-circle ml-2"></i></a>
                </div>
                <div class="col-sm-6 col-xs-12 mb-2">
                    <button 
                        type="submit"
                        class="btn btn-success w-100">
                        Actualizar <i class="fa fa-check-circle ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
     </form>
@stop

@section('css')
@stop

@section('js')
@stop