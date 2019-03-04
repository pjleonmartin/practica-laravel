@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')

            <div class="card">
                <div class="card-header">Curriculum Vitae</div>

                <div class="card-body">
                    <form action="{{ route('user.curriculum_update') }}" method="POST">
                        @csrf
                        <textarea name="content">{{ Auth::user()->curriculum }}</textarea>
                        <br>
                        <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                    </form>
                    @section('js')
                    <script>
                        CKEDITOR.replace('content');
                    </script>
                    @endsection
                </div>
            </div>
        </div>
    </div>
</div>
@endsection