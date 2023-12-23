@foreach ($team->comments as $comment)
    <form class="container border mt-5" action="{{ url('editcomment') }}" method="POST">
        @csrf
        <h4>{{ $comment->user->name }}</h4>
        <input type="hidden" value="{{ $comment->id }}" name="id" />
        <textarea name="content" {{ auth()->user()->id !== $comment->user_id ? 'disabled' : 'required' }} rows="3"
            cols="10" style="width: 100%">{{ $comment->content }}</textarea>
        <a href="/deletecomment/{{ $comment->id }}" class="btn btn-danger">Delete</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endforeach