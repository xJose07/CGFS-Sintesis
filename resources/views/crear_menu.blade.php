@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Creación del Menu del Dia') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('crearM') }}" role="form" enctype="multipart/form-data" method="POST" >
                        <input type="hidden" name="_method" value="PUT">
                            {!! csrf_field() !!}
                            
                        <!--Entrante 1-->
                        <div class="row mb-3">
                            <label for="ent" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Entrante') }}</label>

                            <div class="col-md-6">
                                <select id="ent" class="form-select" aria-label="Default" name="ent">
                                    @foreach($datE as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                <!--Entrante 2-->
                                <select id="ent" class="form-select" aria-label="Default" name="ent2">
                                    @foreach($datE as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                <!--Entrante 3-->
                                <select id="ent" class="form-select" aria-label="Default" name="ent3">
                                    @foreach($datE as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="prim" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Primer plato') }}</label>

                            <div class="col-md-6">
                                <!-- Prim1 -->
                                <select id="prim" class="form-select" aria-label="Default" name="prim">
                                    @foreach($datPP as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>

                                <!-- Prim2 -->
                                <select id="prim" class="form-select" aria-label="Default" name="prim2">
                                    @foreach($datPP as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>

                                <!-- Prim3 -->
                                <select id="prim" class="form-select" aria-label="Default" name="prim3">
                                    @foreach($datPP as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="postre" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Postre') }}</label>

                            <div class="col-md-6">
                                <!-- postre1 -->
                                <select id="postre" class="form-select" aria-label="Default" name="postre">
                                    @foreach($datP as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                <!-- postre2 -->
                                <select id="postre" class="form-select" aria-label="Default" name="postre2">
                                    @foreach($datP as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                <!-- postre3 -->
                                <select id="postre" class="form-select" aria-label="Default" name="postre3">
                                    @foreach($datP as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <!--------------->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="gooey-button" style="font-size: 10px;letter-spacing: 2px;" type="submit" class="btn btn-primary">
                                    {{ __('Crear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection