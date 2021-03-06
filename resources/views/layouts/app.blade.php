<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Music Wind!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css')  }}">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-top">
        {{ csrf_field()  }}
        <a class="navbar-brand" href="/">Music Wind</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <img src="{{ asset('images/menu.png')  }}" class="navbar-toggler-icon"/>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav list-items">
                <li class="nav-item">
                    <a class="nav-link grow" href="/">Home <span class="sr-only text-right">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link grow" href="/albums">Albums</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link grow" href="/artists">Artists</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link grow" href="{{ route('login')  }}">Log in</a>
                </li>
                <li class="nav-item signup-item">
                    <a class="nav-link grow" href="{{ route('register')  }}">Sign up</a>
                </li>
                @else
                    <li class="nav-item">
                        <form action="{{ route('logout')  }}" method="post">
                            {{ csrf_field()  }}
                            <button class="btn btn-link grow" type="submit">Log out</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="row main-row">
        @yield('player')
        @guest
        <div class="col col-left">
            @yield('content')
        </div>
        <div class="col col-right">
            <h1 class="display-4 title-large">Welcome to the best music storage!</h1>
            <h3 class="title-medium">Listen to loads of songs for free!</h3>
            <ul class="title-medium list-right">
                <li><h4>Discover music you'll fall in love with</h4></li>
                <li><h4>Create your own playlists</h4></li>
                <li><h4>Follow artists to keep up to date</h4></li>
            </ul>
        </div>
        @endguest

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>
</body>
</html>
