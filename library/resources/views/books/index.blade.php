@extends('layouts.app')

@section('content')

	<h1> Books </h1>

	@foreach ($books as $book)
		<article>
			<h2> {{ $book->name }} </h2>
			<div class="body">
				<a href="/books/{{ $book->id }}"> <img src="{{ $book->image }}" > </a>
			</div>
		</article>
	@endforeach

@endsection