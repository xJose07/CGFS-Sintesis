@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDITAR ROLES') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="correcte">{{$a}}</p>
                    <div class="paper">  
                    @foreach($users as $user)
                    <form action="{{ route('editaa-role', ['filename'=>$user->id]) }}" role="form">  
                     
                    <div class="editorderole"> <div class="container-avatar">
                        <img src="{{ route('getavatar', ['filename'=>$user->id])}}" class="avatar">  {{$user->name}} {{$user->surname}} | {{$user->email}} | role: {{$user->role}}
                        <div style="float: right;">
                            <select id="gooey-button" style="font-size: 10px;letter-spacing: 2px;float: left;" class="nav-link dropdown-toggle" name="role" id="role">
                              <option value="{{$user->role}}">--Selecciona una opción--</option>  
                              <option value="admin">Admin</option>
                              <option value="chef">Chef</option>
                              <option value="user">User</option>
                            </select>&nbsp;&nbsp;

                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                                <defs>
                                    <filter id="gooey">
                                        <!-- in="sourceGraphic" -->
                                        <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />
                                        <feColorMatrix in="blur" type="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="highContrastGraphic" />
                                        <feComposite in="SourceGraphic" in2="highContrastGraphic" operator="atop" />
                                    </filter>
                                </defs>
                            </svg>

                            <input id="gooey-button" style="font-size: 10px;letter-spacing: 2px;" type="submit" class="boton-roles btn-primary btn" value="Modificar rol">
                            
                        </div>                     
                    </div>
                    </div> 
                    <br>
                    
                    </form>
                    @endforeach

                </div>  
                <p class="correcte"></p>  
                </div>
                <br>
                <div style=" margin: 0 auto;"> {{ $users->links() }}</div>
                <br>
            
        </div>
        </div>
    </div>
</div>
@endsection
