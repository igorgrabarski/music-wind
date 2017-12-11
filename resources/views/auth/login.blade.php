@extends('layouts.app')
@section('content')
    <h3 class="title-medium text-center">Log in to your Music Wind account</h3>
    <br>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field()  }}
        <div class="form-group">
            <label for="email">Email address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
         </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
        </div>
            <button type="submit" class="btn btn-block button-login">
            LOG IN
        </button>
        @if($errors->any())
            <ul class="list-group list">
                @foreach($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error  }}</li>
                @endforeach
            </ul>
        @endif
    </form>
    <h6 class="text-left or">Don't have an account yet? <a href="{{ route('register')  }}">Sign up here</a></h6>
@endsection

