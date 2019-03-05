@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')  

            <div class="card">
                <div class="card-header">Generate a PDF list</div>

                <div class="card-body">
                    <a href="{{ route('pdf.activeusers') }}" role="button" class="btn btn-outline-primary">PDF list with active users</a>
                    <a href="{{ route('pdf.inactiveusers') }}" role="button" class="btn btn-outline-primary">PDF list with inactive users</a>
                    <a href="{{ route('pdf.logs') }}" role="button" class="btn btn-outline-primary">PDF list with server log</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
