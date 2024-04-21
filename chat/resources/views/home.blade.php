@extends('layouts.app2')
@section('content')
    <div class="row">
        <div class="col-md-5">
            @if($users->count() > 0)
                <h3>Pick a user to chat with</h3>
                <ul id="users">
                    @foreach($users as $user)
                    <div class="list-group" style="font-size: larger;">
                        <li class="list-group-item d-flex justify-content-between align-items-center"><span class="label label-info">{{ $user->name }}</span> <a href="javascript:void(0);" class="chat-toggle" data-id="{{ $user->id }}" data-user="{{ $user->name }}">Open chat</a></li>
                    </div>
                        @endforeach
                </ul>
            @else
                <p>No users found! try to add a new user using another browser by going to <a href="{{ url('register') }}">Register page</a></p>
            @endif
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
    @include('chat-box')
@endsection
