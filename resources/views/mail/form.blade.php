@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')

            <div class="card">
                <div class="card-header">Send e-mail</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('mail.send') }}" aria-label="Send e-mail">
                        @csrf

                        <div class="form-group row">
                            <label for="subject" class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject') }}" required autofocus>

                                @if ($errors->has('subject'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') }}" required autofocus></textarea>

                                @if ($errors->has('message'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="addressee" class="col-md-4 col-form-label text-md-right">{{ __('Addressee') }}</label>

                            <div class="col-md-6">
                                <select id="addressee" name="addressee" class="form-control">
                                    @foreach($users as $user)
                                        @if($user->id != \Auth::user()->id)
                                        <option value="{{ $user->email }}">{{ $user->name. ' '. $user->surname }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send E-Mail
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
