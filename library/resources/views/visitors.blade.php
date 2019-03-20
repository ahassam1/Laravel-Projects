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

                    You are logged in the Visitor section! <br>
                    Welcome {{Auth::user()->name}}! <br>
                    Your ID on this system is {{Auth::user()->id}}. <br>
                    Your role is <span style="color:blue"> {{Auth::user()->role}}.

                    <div>
                <h1> Books </h1>

        @foreach ($books as $book)
            <article>

                <h2> {{ $book->name }} </h2>
                <div class="body">
                    <p>
                        ISBN: {{ $book->isbn }} <br>
                        Author: {{ $book->a_name }} <br>
                    </p>
                    <img src="{{ $book->image }}" >
                </div>
                <button value="subscribe"> </button>
            </article>
        @endforeach
        
            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
