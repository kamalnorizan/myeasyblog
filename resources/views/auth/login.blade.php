<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MASJIDKU</title>

    <link href="{{asset('res/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('res/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('res/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('res/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img src="{{ asset('img/masjidku.png') }}" width="85%" alt=""></h1>

            </div>
            <!--<h3>MasjidKu</h3>-->
            <p>Sistem Pengurusan Covid-19 Tracer MasjidKu</p>
            {{-- <p>Login in. To see it in action.</p> --}}
            <form class="m-t" role="form" method="POST" action="/login">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" placeholder="Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{-- <input type="password" class="form-control" placeholder="Password" required=""> --}}
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Log Masuk</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('res/js/jquery-2.1.1.js')}}"></script>
    <script src="{{ asset('res/js/bootstrap.min.js')}}"></script>

</body>

</html>
