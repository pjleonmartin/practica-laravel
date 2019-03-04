@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')  

            <div class="card">
                <div class="card-header">My Messages</div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Addressee</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                            <tr>
                                <td><a href="{{ route('user.profile',['id' => $message->addressee->id]) }}"> {{ $message->addressee->name }}</a></td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ $message->message }}</td>
                                <td><div id="myModal" class="modal fade">
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
                                                    <p>Do you really want to delete this message? This process cannot be undone</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                    <button type="button" onClick="location.href='{{ route('message.delete', ['id' => $message->id]) }}'" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#myModal" class="btn btn-danger" data-toggle="modal">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $messages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
