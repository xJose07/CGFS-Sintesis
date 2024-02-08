@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CONTACTO') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="correcte">{{$a}}</p>
                    <form action="{{ route('emailcon') }}" role="form" enctype="multipart/form-data" method="GET" >
                        
                        
                            <div class="row mb-3">
                                <label for="message" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Mensaje') }}</label>
    
                                <div class="col-md-6">
                                    <textarea class="form-control" id="message" name="message" ></textarea>
                                </div>
                            </div>
                        
                        <!--------------->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="gooey-button" style="font-size: 10px;letter-spacing: 2px;" type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form><p class="correcte"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection