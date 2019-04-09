@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a New Playlist</div>

                <div class="card-body">
                    <form action = "/playlists/myplaylists/" method = "POST">
                        @csrf
                        <div class="field">
                            <label class="label" for="title">Playlist Title</label>
                            <div class="control">
                                <input type="text" name="title" placeholder="title here">
                            </div>
                        </div>

                        <div>
                            <button type='submit'>Create My Playlist</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
