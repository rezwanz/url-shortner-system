<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple URL Shortner System</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('/') }}assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}assets/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mb-3">Create URL Shortner</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <form method="post" action="{{ route('generate.link') }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="link" class="form-control" placeholder="Please Enter URL">
                    <div>
                        <div class="input-group-addon">
                            <button class="btn btn-success">Generate Link</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Link</th>
            <th>Short Link</th>
        </tr>
        </thead>

        <tbody>
        @foreach($shortLinks as $shortLink)
            <tr>
                <td>{{ $shortLink->id }}</td>
                <td>{{ $shortLink->link }}</td>
                <td><a href="{{ route('shorten.link', $shortLink->code) }}" target="_blank">{{ route('shorten.link', $shortLink->code) }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>


<script src="{{ asset('/') }}assets/js/jquery-3.7.1.min.js"></script>
<script src="{{ asset('/') }}assets/js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}assets/js/all.min.js"></script>

</body>
</html>
