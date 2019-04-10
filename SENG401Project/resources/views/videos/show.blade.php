@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Video</div>
                <div class="card-body">
                    <iframe style="text-align:center;" width="700" height="360" src="https://www.youtube.com/embed/{{ $videoObject->id }}"></iframe>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Comment</div>
                <div class="card-body">
                    <form action = "/comments/{{ $videoObject->id }}" method="POST">
                        @ csrf
                        
                        <div class="field">
                            <div class="control">
                                <input type="textarea" name="content" placeholder="Say something nice...">
                            </div>
                        </div>

                        <div>
                            <button type='submit'>Submit Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
