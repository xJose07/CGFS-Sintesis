@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crear plato') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('crear') }}" role="form" enctype="multipart/form-data" method="POST" >
                        <input type="hidden" name="_method" value="PUT">
                            {!! csrf_field() !!}
                            
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="plat" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Nuevo Plato') }}</label>

                            <div class="col-md-6">
                                <!--Hacer un bucle for, con las habitaciones-->
                                <select id="plat" name="plat" class="form-select" aria-label="Default">
                                    <option value=""></option>
                                    <option value="entrant">entrante</option>
                                    <option value="primer plat">primer plato</option>
                                    <option value="postre">postre</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="description" rows="3" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Imagen') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control"  name="image" value="{{ old('image') }}" accept="image/*">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="preu" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input id="preu" type="number" step="any" class="form-control @error('name') is-invalid @enderror" name="preu" value="" required autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--------------->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="gooey-button">
                                    {{ __('Crear plat') }}
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