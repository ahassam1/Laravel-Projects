@extends('layouts.app')

@section('content')

    <h1> Write a new comment </h1>

    <hr/>

    {!! Form::open(['url' => 'comments']) !!}
    <!--
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
	-->

    <!-- Text Form Input -->
    <div class="form-group">
    	{!! Form::label('text', 'Text:') !!}
    	{!! Form::textarea('text', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Add Comment Form Input -->
    <div class="form-group">
    	{!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}


@endsection
