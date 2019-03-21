@extends('layouts.app')

@section('content')

    <h1> Write a new comment </h1>

    <hr/>

    
    <form action = "{{route('comment_post', $book_id)}}" method = "POST">
        {{ csrf_field() }}
        <label>Write a Comment!</label>
        <div>
            <input type="textarea" name="text">
        </div>

        <div>
            <button type='submit'>Submit Comment</button>
        </div>
    </form>

@endsection
