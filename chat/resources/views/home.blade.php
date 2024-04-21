@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center mb-4">Pick a user to chat with</h2>
                </div>
                <div class="card-body">
                    @if($users->count() > 0)
                    <ul class="list-group">
                        @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="badge {{ $user->status ? 'badge-success' : 'badge-danger' }} font-weight-bold h3" style="font-size: x-large;">{{ $user->name }}</span>
                            <a href="javascript:void(0);" class="btn btn-primary btn-lg chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}">Open chat</a>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <p class="text-center lead">No users found! Try to add a new user using another browser by going to <a href="{{ url('register') }}">Register page</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('logout') }}" class="mt-4 text-center">
    @csrf
    <button type="submit" class="btn btn-outline-danger btn-lg">Logout</button>
</form>

@include('chat-box')
@endsection
