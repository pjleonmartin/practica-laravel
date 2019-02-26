@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')

            <div class="card">
                <div class="card-header">Account information</div>
                <div class="row text-center">
                    <div class="container-avatar">
                    <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
                        @if($user->image)
                        <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" />
                        @endif
                    </a>
                    </div>

                    <h3>{{ $user->name }}</h3>
                    <em>click my face for more</em>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">		
                                <h4 class="modal-title">Detailed profile view</h4>	
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="m-t-30"> <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="img-circle" width="150">
                                                    <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                                                    <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                                </center>
                                            </div>
                                            <div>
                                                <hr> </div>
                                            <div class="card-body"> <small class="text-muted">Full name</small>
                                                <h6>{{ $user->name . ' ' . $user->surname }}</h6> <small class="text-muted">Nickname </small>
                                                <h6>{{ $user->nick }}</h6> <small class="text-muted">Email address </small>
                                                <h6>{{ $user->email }}</h6> <small class="text-muted">Join date </small>
                                                <h6>{{ $user->created_at }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <center>
                                        <button type="button" class="btn btn-info" data-dismiss="modal">I've heard enough about {{ $user->name }}</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
