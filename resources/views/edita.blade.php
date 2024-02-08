@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EDITAR PERFIL') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="correcte">{{$a}}</p>
                    <form action="{{ route('edita') }}" role="form" enctype="multipart/form-data" method="POST" >
                        <input type="hidden" name="_method" value="PUT">
                            {!! csrf_field() !!}
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end txt-form">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end txt-form">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ Auth::user()->surname }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end txt-form">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if(Auth::user()->image)
                        <!--IMATGE--><img src="{{ route('avatar', ['filename'=>Auth::user()->image])}}" class="avatar2">
                        @endif
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end txt-form">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control"  name="image" value="{{ old('image') }}" accept="image/*">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                        <!--------------->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button id="gooey-button" style="font-size: 10px;letter-spacing: 2px;" type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                                <a class="btn btn-link" href="{{ route('editpass') }}">
                                 {{ __('Edit password') }}
                             </a>
                             
                            </div>
                        </div>
                    </form><p class="correcte"></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection