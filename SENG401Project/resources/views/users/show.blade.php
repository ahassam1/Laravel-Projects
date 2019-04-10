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

                    <a href = "/users/{{ $user->id }}/add">
                        <button>Add Video</button>
                    </a>


                    </form>


                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
