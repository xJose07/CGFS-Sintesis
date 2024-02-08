@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reserva') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="correcte @isset($site) incorrecte @endisset">{{$a}}</p>
                    <!--Hacer función y luego redirigir a la ruta correcta-->
                    <form action="{{ route('reserva2') }}" role="form" enctype="multipart/form-data" method="GET" >
                       <!-- <input type="hidden" name="_method" value="PUT">
                            {!! csrf_field() !!}-->
                            

                        <div class="row mb-3">
                            <label for="tor" class="col-md-4 col-form-label text-md-end txt-form2" style="font-size:17px">{{ __('Turno') }}</label>

                            <div class="col-md-6">
                                <!--Hacer un bucle for, con las habitaciones-->
                                <select id="gooey-button" class="form-select" aria-label="Default" name="turno">
                                    <option value="Comida">Comida</option>
                                    <option value="Cena">Cena</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="per" class="col-md-4 col-form-label text-md-end txt-form2" style="font-size:17px">{{ __('Numero de personas') }}</label>

                            <div class="col-md-6">
                                <!--Hacer un bucle for, con las habitaciones-->
                                <select id="gooey-button" class="form-select" aria-label="Default" name="personas">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                        </div>
                        
                        <!--------------->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="gooey-button" type="submit" class="btn btn-primary">
                                    {{ __('Reserva') }}
                                </button>
                            </div>
                            <p class="correcte"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection