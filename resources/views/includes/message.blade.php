@if(session('message_success'))
    <div class="alert alert-success">
        {{ session('message_success') }}
    </div>
@endif

@if(session('message_error'))
    <div class="alert alert-danger">
        {{ session('message_error') }}
    </div>
@endif