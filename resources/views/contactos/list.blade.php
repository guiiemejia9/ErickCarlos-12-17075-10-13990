@extends('layouts.base')
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-10">Lista de contactos</h2>
            <a class="btn btn-success mb-4" href="{{url('/formc')}}">Agregar contacto</a>
            @if(session('eliminado'))
                <div  class="alert alert-success">
                    {{ session('eliminado')}}
                </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                       <th>Nombre</th>
                       <th>Email</th>
                       <th>Tel</th>
                       <th>Tema</th>
                       <th>Mensaje</th>
                       <th>Aciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($contactos as $contacto)
                    <tr>
                        <td>{{$contacto->nombre}}</td>
                        <td>{{$contacto->email}}</td>
                        <td>{{$contacto->tel}}</td>
                        <td>{{$contacto->tema}}</td>
                        <td>{{$contacto->mensaje}}</td>

                            <a href="{{route('editformc',$contacto->id)}}" class="btn btn-primary mb-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{route('deletec',$contacto->id)}}" method="post">
                                @csrf @method('DELETE')
                                //Fusion Java Scrip mensaje
                                <button type="submit" onclick="return confirm('borrar?');" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            {{$contactos->links()}}
        </div>
    </div>
</div>

