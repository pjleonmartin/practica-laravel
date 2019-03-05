<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1 class="text-center">Required user list</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Avatar</th>
                    <th>Full name</th>
                    <th>Role</th>
                    <th>E-Mail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td> 
                        @if($user->image)
                        <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" class="avatar" width="50px" />
                        @else
                        <img src="{{ asset('img/default.png') }}" class="avatar" width="50px" />
                        @endif
                    </td>
                    <td>{{ $user->name . ' ' . $user->surname }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>