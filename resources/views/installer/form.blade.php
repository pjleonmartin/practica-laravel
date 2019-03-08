@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')

            <div class="card">
                <div class="card-header">Installer</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('install.send') }}" aria-label="Installer">
                        @csrf

                        <div class="form-group row">
                            <label for="host" class="col-md-4 col-form-label text-md-right">{{ __('Host') }}</label>

                            <div class="col-md-6">
                                <input id="host" type="text" class="form-control{{ $errors->has('host') ? ' is-invalid' : '' }}" name="host" value="{{ old('host') }}" required autofocus>

                                @if ($errors->has('host'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('host') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="port" class="col-md-4 col-form-label text-md-right">{{ __('Port') }}</label>

                            <div class="col-md-6">
                                <input id="port" type="number" class="form-control{{ $errors->has('port') ? ' is-invalid' : '' }}" name="port" value="{{ old('port') }}" required autofocus>

                                @if ($errors->has('port'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('port') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="database" class="col-md-4 col-form-label text-md-right">{{ __('Database Name') }}</label>

                            <div class="col-md-6">
                                <input id="database" type="text" class="form-control{{ $errors->has('database') ? ' is-invalid' : '' }}" name="database" value="{{ old('database') }}" required autofocus>
                                @if ($errors->has('database'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('database') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Install Application
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
