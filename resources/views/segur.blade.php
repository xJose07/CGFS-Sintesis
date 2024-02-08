@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('¿ESTÀS SEGURO?') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        
                        <!--------------->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4" style="margin: 0">
                                <a href="/home" id="gooey-button" class="boton-roles btn-primary btn botoeliminasino" >NO</a>
                                <a href="/deleteuser" id="gooey-button" class="boton-roles btn-primary btn botoeliminasino" >SI</a>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection