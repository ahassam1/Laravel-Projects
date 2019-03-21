@extends('layouts.app')

@section('content')

    <h1> Write a new comment </h1>

    <hr/>

    
    <form action = "{{route('comment_post', $book_id)}}" method = "POST">
        {{ csrf_field() }}
        <label>Submit Comment</label>
        <div>
            <input type="text" name="text">
        </div>

        <div>
            <button type='submit'>Submit Comment</button>
        </div>
    </form>

@endsection
