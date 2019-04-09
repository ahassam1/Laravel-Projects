@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to {{$user -> playlist_title}} <br>
                    This is the page of {{ $user->name }}! <br>
                    <img src= {{$user->picture_url}}>


                    <a href = "/users/{{ $user->id }}/edit">
                        <button>Edit Profile</button>
                    </a>
                    
                    <br>
                    <form method = 'POST' action = "/users/{{ $user->id }}">

                    Please Enter a Video URL to Add to Playlist (Yo Clean this Up):<br>
                        <input type="text" name="firstname" value="Mickey">
                    <br>


                    </form>


                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
