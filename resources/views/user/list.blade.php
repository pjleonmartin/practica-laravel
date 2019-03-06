@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            <div class="card">
                <div class="card-header">User list requested</div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Full name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('user.profile',['id' => $user->id]) }}">{{ $user->name . ' ' . $user->surname }}</a></td>
                                <td>@if(Auth::user()->role == 'admin')
                                    <div id="myModal" class="modal fade">
                                        <div class="modal-dialog modal-confirm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="icon-box">
                                                        <i class="material-icons">&#xE5CD;</i>
                                                    </div>				
                                                    <h4 class="modal-title">Are you sure?</h4>	
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Do you really want to delete this user? This process cannot be undone</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                    <button type="button" onClick="location.href ='{{ route('user.delete', ['id' => $user->id]) }}'" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#myModal" data-toggle="modal"><i class="fas fa-user-minus"></i></a>
                                    <a href="{{ route('user.admin_editprofile', ['id' => $user->id]) }}"><i class="fas fa-user-edit"></i></a>
                                    @if($user->active == FALSE)
                                    <a href="{{ route('user.activate', ['id' => $user->id]) }}"><i class="fas fa-user-check"></i></a>
                                    @endif
                                    @endif
                                    <a href="{{ route('message.form', ['id' => $user->id]) }}"><i class="fas fa-envelope-square"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
