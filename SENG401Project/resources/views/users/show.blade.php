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
                    <img src= {{$user->picture_url}}> <br>


                    <a href = "/users/{{ $user->id }}/edit">
                        <button>Edit Profile</button>
                    </a>

                    <form method= 'POST' action="/videos/addvideo">
                        @csrf

                        Input Video URL:<br>
                        <input type="text" name="url">
                        <br><br>
                        <input type="submit">
                    </form>
                </div>

                @if (!empty($videoapi))
                    @foreach ($videoapi as $video)
                    <div style="text-align:center; padding:10px;" class="card">
                        <a href="/videos/{{ $video[0]->id }}">
                            <h2 class="card-header">{{ $video[0]->snippet->title }}</h2>
                        </a>

                        <iframe width="480" height="280" src="https://www.youtube.com/embed/{{ $video[0]->id }}"></iframe>
                        <div class="card-body">
                            <i>Viewed {{ $video[0]->statistics->viewCount }} times.</i> <br>

                        @foreach($video[1] as $comment)

                        <p> {{$comment->name}} </p> <br>
                        <p> {{$comment->content}} </p>

                        @endforeach


                        </div>
                    </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
