@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <h4 class="title-medium text-center">You are logged in!</h4>
    <form action="{{ route('logout')  }}" method="post">
        {{ csrf_field()  }}
        <button class="btn btn-block button">LOG OUT</button>
    </form>

@endsection