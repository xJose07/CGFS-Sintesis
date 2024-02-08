@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Platos') }}</div>
                   
                    <div class="card">
                        <div class="card-body " style="padding-bottom: 0px;">
                            <div class="row">
                                </div> 
                               
                                <div class="col menu-back cartac " style="padding:50px; padding-top: 70px;padding-bottom:20px;margin-bottom:20px">
                                    <br><h1 style="text-align: center;color:black">LA CARTA</h1>
                                     <h3 class="tmenu">ENTRANTES</h3> <br>
                                    @foreach($datE as $value)
                                        <a style="text-decoration:none;color:black" href="{{ route('detailE', ['filename'=>$value->id]) }}">{{$value->name}} ----------------- Precio: {{$value->precio}}€
                                            <div>@if (Auth::user())
                                            @if(Auth::user()->role == 'chef') 
                                                <a href="{{ route('eliminaplat', ['filename'=>$value->id,'filename2'=>'entrant']) }}" id="gooey-button" style="font-size: 10px;letter-spacing: 2px;background-color:rgb(254, 136, 136);color: rgb(156, 23, 23);margin-bottom: 0px;border-bottom-width: 50px;bottom: 30px;" class="boton-roles btn-primary btn" >Eliminar</a>
                                            @endif 
                                        @endif</div> </a>
                                           <br>
                                    @endforeach

                                    <br> <h3 class="tmenu">PRIMEROS PLATOS</h3> <br>
                                    @foreach($datPP as $value)
                                    <a style="text-decoration:none;color:black" href="{{ route('detailPP', ['filename'=>$value->id]) }}">{{$value->name}} ----------------- Precio: {{$value->precio}}€ 
                                        <div>@if (Auth::user())
                                            @if(Auth::user()->role == 'chef') 
                                                <a href="{{ route('eliminaplat', ['filename'=>$value->id,'filename2'=>'primer plat']) }}" id="gooey-button" style="font-size: 10px;letter-spacing: 2px;background-color:rgb(254, 136, 136);color: rgb(156, 23, 23);margin-bottom: 0px;border-bottom-width: 50px;bottom: 30px;" class="boton-roles btn-primary btn" >Eliminar</a>
                                            @endif 
                                        @endif </div></a>
                                     <br>
                                    @endforeach

                                    <br> <h3 class="tmenu">POSTRES</h3> <br>
                                    @foreach($datP as $value)
                                    <a style="text-decoration:none;color:black" href="{{ route('detailP', ['filename'=>$value->id]) }}">{{$value->name}} ----------------- Precio: {{$value->precio}}€ 
                                        <div>@if (Auth::user())
                                        @if(Auth::user()->role == 'chef') 
                                            <a href="{{ route('eliminaplat', ['filename'=>$value->id,'filename2'=>'postre']) }}" id="gooey-button" style="font-size: 10px;letter-spacing: 2px;background-color:rgb(254, 136, 136);color: rgb(156, 23, 23);margin-bottom: 0px;border-bottom-width: 50px;bottom: 30px;" class="boton-roles btn-primary btn" >Eliminar</a>
                                        @endif 
                                    @endif </div></a>  <br>
                                    @endforeach

                                </div>
                             
                        </div>
                    </div><br>
                    
            </div><br>
    </div>
</div>
@endsection