@extends('layouts.app')

@section('content')

<article>
	<base href="/books/{{ $book->id }}/" />

	<h1> {{ $book->name }} </h1>
	<div class="body">
		<img src="{{ $book->image }}" >
	</div>
	
	<br>

	<a href="{{ route('comment_create', [$book->id]) }}">
		<button> COMMENT </button>
	</a>

	@foreach ($comments as $c)
		<p>{{ $c->text }}</p>>
	@endforeach



</article>

@endsection