<form action = "/videos/{{ $video_key }}" method="POST">
    @ csrf
    
    <div class="field">
        <label class="label" for="content"> Write a comment: </label>
        <div class="control">
            <input type="textarea" name="content" placeholder="Say something nice...">
        </div>
    </div>

    <div>
        <button type='submit'>Submit Comment</button>
    </div>
</form>