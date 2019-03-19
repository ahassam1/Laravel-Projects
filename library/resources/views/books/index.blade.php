@extends('layouts.app')

@section('content')

	<h1> Books </h1>

	@foreach ($books as $book)
		<article>
			<h2> {{ $book->name }} </h2>
			<div class="body">
				<img src="{{ $book->image }}" >
			</div>
		</article>
	@endforeach

@endsection