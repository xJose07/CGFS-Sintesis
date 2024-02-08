@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('CREAR EVENTOS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="correcte">{{$a}}</p>
                    <form action="{{ route('imgnovaa') }}" role="form" enctype="multipart/form-data" method="POST" >
                        <input type="hidden" name="_method" value="PUT">
                            {!! csrf_field() !!}

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Imagen') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" accept="image/png, image/jpeg, image/PNG," class="form-control"  name="image" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title"  class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Título') }}</label>

                            <div class="col-md-6" >
                                <input id="title" type="text" class="form-control" name="title">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end txt-form3">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="description" name="description" ></textarea>
                            </div>
                    </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button  id="gooey-button" style="font-size: 10px;letter-spacing: 2px;" type="submit" class="btn btn-primary">
                                    {{ __('Subir') }}
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