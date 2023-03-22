<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

</head>

<body>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::get('fail'))
        <div class="alert alert-danger alert-highlighted">
            {{ Session::get('fail') }}
        </div>
    @elseif (Session::get('successful'))
        <div class="alert alert-success alert-highlighted">
            {{ Session::get('successful') }}
        </div>
    @endif

    <div class="form-modal">

        <div class="form-toggle">
            <button id="login-toggle" onclick="toggleLogin()">log in</button>
            <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
        </div>

        <div id="login-form">
            <form action="{{ route('user.check') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Enter email" />
                <input type="password" name="password" placeholder="Enter password" />
                <button type="submit" class="btn login">login</button>
                {{-- <p><a href="javascript:void(0)">Forgotten account</a></p> --}}
            </form>
        </div>

        <div id="signup-form">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Enter your name" />
                <input type="email" name="email" placeholder="Enter your email" />
                <input type="text" name="tp" placeholder="+94772193832" />
                <input type="password" name="password" placeholder="Create password" />
                <button type="submit" class="btn signup">create account</button>
            </form>
        </div>
        
        <p class="text-center pb-3">Admin <a href="{{ route('user.login') }}">Login</a></p>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/auth.js') }}"></script>
</body>

</html>
