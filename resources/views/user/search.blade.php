@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            <div class="card">
                <div class="card-header">Search form</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.search_send') }}" aria-label="Search form">
                        @csrf

                        <div class="form-group row">
                            <label for="criterion" class="col-md-4 col-form-label text-md-right">{{ __('Criterion') }}</label>

                            <div class="col-md-6">
                                <input id="criterion" type="text" class="form-control{{ $errors->has('criterion') ? ' is-invalid' : '' }}" name="criterion" value="{{ old('criterion') }}" required autofocus>

                                @if ($errors->has('criterion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('criterion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="field" class="col-md-4 col-form-label text-md-right">{{ __('Search by') }}</label>

                            <div class="col-md-6">
                                <select id="field" name="field" class="form-control">
                                    <option value="nick">Nickname</option>
                                    <option value="name">Name</option>
                                    <option value="surname">Surname</option>
                                    <option value="email">E-mail</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
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
