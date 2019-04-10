@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Video</div>
                <div class="card-body">
                    <iframe style="text-align:center;" width="700" height="360" src="https://www.youtube.com/embed/{{ $videoObject->id }}"></iframe>
                </div>
            </div>

            <!-- write a comment if user is registered -->
            @if (Auth::user())
            <div class="card">
                <div class="card-header">Comment</div>
                <div class="card-body">
                    <form action="/comments/{{ $videoObject->id }}" method="POST">
                        @csrf
                        
                        <div class="field">
                            <div class="control">
                                <input type="textarea" name="content" placeholder="Say something nice...">
                            </div>
                        </div>

                        <div>
                            <button type='submit'>Submit Comment</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

            <!-- display all comments for this video -->
            @if ($comments->count())
            <div class="card">
                <div class="card-header">Comments from Your Fellow Humans</div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                        <div class="card">
                            <div class="card-header">{{ $comment -> name }}</div>
                            <div class="card-body">{{ $comment -> content }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- show form errors -->
            @if ($errors->any())
                <div class="notification is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
