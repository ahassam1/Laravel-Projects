@extends('layouts.app')

@section('content')

	<h1> Books </h1>

	@foreach ($data as $d)
		<article>
			<h2> {{ $d->name }} </h2>
			<p>
			ISBN: {{$d->isbn}} <br>
			Author: {{$d->a_name}}
			</p>
			<div class="body">
				<a href="/books/{{ $d->id }}"> 
				<img src="{{ $d->image }}" > </a>
			</div>
		</article>
	@endforeach

@endsection