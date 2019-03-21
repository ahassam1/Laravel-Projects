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

                    You are logged in the Admins section! <br>
                    Welcome {{Auth::user()->name}}! <br>
                    Your ID on this system is {{Auth::user()->id}}. <br>
                    Your role is <span style="color:blue"> {{Auth::user()->role}}.
                    </span>
                <div>
                <h1> Users </h1>

        @foreach ($users as $u)
            <article>

                <div class="body">
                    <p>
                        ID: {{ $u->id }} <br>
                        Name: {{ $u->name }} <br>
                        Email: {{ $u->email }} <br>
                        Role: {{ $u->role }} <br>
                        BirthDate: {{ $u->birthdate }} <br>
                        Education: {{ $u->education_field }} <br>

                        @if($u->role == "visitor")
                        
                            <h5> Change Role <h5>
                            <a href="{{ route('role_changer', [$u->id, 'subscriber']) }}">
                            <button> Make Subscriber </button> </a>
                            <a href="{{ route('role_changer', [$u->id, 'admin']) }}">
                            <button> Make Admin </button></a>

                        @endif

                        
                        @if($u->role == "subscriber")
                        
                            <h5> Change Role <h5>
                            <a href="{{ route('role_changer', [$u->id, 'visitor']) }}">
                            <button> Make Visitor </button></a>
                            <a href="{{ route('role_changer', [$u->id, 'admin']) }}">
                            <button> Make Admin </button></a>


                        @endif

                        
                        @if($u->role == "admin")

                            <h5> Change Role <h5>
                            <a href="{{ route('role_changer', [$u->id, 'visitor']) }}">
                            <button> Make Visitor </button></a>
                            <a href="{{ route('role_changer', [$u->id, 'subscriber']) }}">
                            <button> Make Subscriber </button></a>
                        
                        
                        @endif
                    </p>


                </div>
            </article>
        @endforeach

            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
