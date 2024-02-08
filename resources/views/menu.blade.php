@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('El menú del dia') }}</div>

                <div class="card-body">
                    
                    
                        <div class="menu-back" style="padding-bottom: 0px;">
                            <div class="row">
                                
                                <div class="col menu">
                                    <br><br>
                                    <h1 style="text-align: center; color:black">MENÚ</h1>
                                    
                                    <h3 class="tmenu">ENTRANTE</h3>
                                    @foreach($data as $value)
                                        {{$value->entrante}}<br/><br/>
                                    @endforeach
                                    <h3 class="tmenu">PRIMER PLATO</h3>
                                    @foreach($data as $value)
                                    {{ __($value->primer) }}<br/><br/>
                                     @endforeach    
                                    <h3 class="tmenu">POSTRE</h3>
                                    @foreach($data as $value)
                                    {{ __($value->postre) }}<br/><br/>
                                    @endforeach
                                    <br/><br/>
                                        
                                    Precio: 13,99€

                                    <p class='detalles'>Incluye bebida y café </p>
                                </div>
                            </div>
                        
                    </div><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection