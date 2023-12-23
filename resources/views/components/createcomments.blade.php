<form method="POST" action="{{ url('createcomment') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Enter your comment</label>
        <textarea class="form-control" name="content" cols="30" rows="10" required></textarea>
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="team_id" value="{{ $team->id }}">
    </div>
    <button type="submit" class="btn btn-primary">Create Commnet</button>
</form>