@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="/users/{{ $user->id }}" style="margin-bottom: 1em">
                        @method('PATCH')
                        @csrf

                          User Name:<br>
                          <input type="text" name="name" value="{{$user->name}}">
                          <br>
                          Playlist Name:<br>
                          <input type="text" name="playlist_title" value="{{$user->playlist_title}}">
                          <br>
                          Picture URL:<br> 
                          <input type="text" name="picture_url">
                          <br><br>
                          <input type="submit" value="Submit">

                    </form>

                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
