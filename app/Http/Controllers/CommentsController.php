<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Mail\CommentReceived;
use App\Models\Comment;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('forbidden-comment')->only('store');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        if (!Auth::check()) {
            return redirect('/teams/' . $request->team_id)->withErrors('Only authenticated user can post comments');
        }

        $team = Team::find($request->team_id);

        $user = User::find(Auth::user()->id);

        $comment = Comment::create([
            'content' => $request->content,
            'user_id' => $user->id,
            'team_id' => $request->team_id,

        ]);

        $mailData = $comment->only('content');
        Mail::to($team->email)->send(new CommentReceived($mailData));

        return redirect('/teams/' . $team->id)->with('status', 'Comment successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request)
    {
        $request->validate([
            'id' => 'required|exists:comments,id',
            'content' => 'required|min:10'
        ]);

        $comment = Comment::find($request->id);


        if (!$comment) {
            return redirect()->back()->withErrors('Comment not found.');
        }


        $comment->content = $request->content;
        $comment->save();

        return redirect()->back()->with('status', 'Comment successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->withErrors('Only creator of the comment can delete comment.');
        }

        $comment->destroy($id);
        return redirect()->back()->with('success', 'Comment is successfully deleted.');
    }
}
