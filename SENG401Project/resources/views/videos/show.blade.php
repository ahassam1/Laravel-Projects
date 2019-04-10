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






            <!-- write a rating if user is registered -->
            @if (Auth::user())
            <div class="card">
                <div class="card-header">Ratings</div>
                <div class="card-body">
                    <form action="/rating/{{ $videoObject->id }}" method="POST">
                        @csrf
                        
                        <div class="field">
                            <div class="control">

                                <select>
                                  <option value="one">1</option>
                                  <option value="two">2</option>
                                  <option value="three">3</option>
                                  <option value="four">4</option>
                                  <option value="five">5</option>
                                </select>

                            </div>
                        </div>

                        <div>
                            <button type='submit'>Submit Rating</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

            <!-- display the average rating for this video -->
            @if ($ratings->count())
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
        </div>
    </div>
</div>
@endsection
