@extends('layouts.app')

@section('content')
    <h3 class="title-medium text-center">Create a new Music Wind account</h3>
    <br>
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label for="password-confirm">Confirm password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block button">SIGN UP</button>

        @if($errors->any())
            <ul class="list-group list">
                @foreach($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error  }}</li>
                @endforeach
            </ul>
        @endif
    </form>
    <h6 class="text-left or">Have an account? <a href="{{ route('login')  }}">Log in here</a></h6>
@endsection