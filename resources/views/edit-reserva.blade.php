@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar reservas') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p class="correcte">{{$a}}</p>
                    <div class="paper">  
                    @foreach($taules as $taula)
                    <form action="{{ route('editaa-reserva', ['filename'=>$taula->id]) }}" role="form">  
                        @if($taula->reservat =="TRUE")
                            <div class="editorderole"> 
                                <div class="container-avatar">
                                    <div>
                                            @if($taula->turno=='Cena') <img class="cena-res "> @else <img class="comida-res "> @endif 
                                            Mesa número {{$taula->id}} reservada por @foreach($users as $user) @if($user->email == $taula->usuario) {{$user->name}} {{$user->surname}} | capacidad máxima de la mesa: {{$taula->tipo_mesa}}  @endif @endforeach
                                            <input id="gooey-button" style="font-size: 10px;letter-spacing: 2px;background-color:rgb(254, 136, 136);color: rgb(156, 23, 23); float: right;" type="submit" class="boton-roles btn-primary btn" value="Eliminar Reserva">

                                    </div>  

                                </div> 
 
                            </div>                    
                        @endif
                    </form>
                    @endforeach
                    <a href="/elimina-reserva" id="gooey-button" style="right:40%;font-size: 10px;letter-spacing: 2px;background-color:rgb(254, 136, 136);color: rgb(156, 23, 23)" class="boton-roles btn-primary btn" >Eliminar todas las reservas</a>
                    <br>
                </div>  
            <br>

            <br>
                <p class="correcte"></p>  
                </div>

            
        </div>
        </div>
    </div>
</div>
@endsection
