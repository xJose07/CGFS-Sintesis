@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Eliminar eventos') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p class="correcte">{{$a}}</p>
                    <div class="paper">  
                    @foreach($events as $event)
                    <form action="{{ route('updateevent', ['filename'=>$event->id]) }}" role="form">  
                    
                            <div class="editorderole"> 
                                <div class="container-avatar">
                                    <div>
                                            <b>{{$event->title}} </b>
                                            <input id="gooey-button" style="font-size: 10px;letter-spacing: 2px;background-color:rgb(254, 136, 136);color: rgb(156, 23, 23); float: right;" type="submit" class="boton-roles btn-primary btn" value="Eliminar Evento">
                                            <div>{{$event->description}}</div>
                                    </div>  

                                </div> 
 
                            </div>                    
                    </form>
                    @endforeach
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
