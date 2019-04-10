@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Browse Section</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user())
                    <p> Welcome to the browse section {{Auth::user()->name}}! </p>
                    @else
                    <p> Welcome to the browse section unregistered visitor! </p>
                    @endif 

                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection