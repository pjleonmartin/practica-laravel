<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1 class="text-center">Server log requested</h1>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Date</th>
                    <th>Activity</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->user }}</td>
                    <td>{{ $log->role }}</td>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->activity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </body>
</html>