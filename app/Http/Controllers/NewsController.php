<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNewsRequest;
use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Team $team)
    {
        $news = [];
        if ($team->id) {
            $news = $team->news()->paginate(2);
        } else {
            $news = News::orderBy('created_at', 'desc')->paginate(2);


            return view("pages.news", compact("news"));
        }
    }

    public function create()
    {
        $teams = Team::all();

        return view('/createnews', compact('teams'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateNewsRequest $request)
    {

        $news = News::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => auth()->id()
        ]);

        $news->teams()->attach($request['teams']);

        session()->flash('message', 'Thank you for publishing article on www.nba.com.');

        return redirect('/createnews');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $news = News::with('user')->with('teams')->latest()->find($id);
        return view('pages.novelty', compact('news'));
    }

    public function showNewsForTeam($team)
    {
        $news = Team::with('news')->find($team)->news()->latest()->paginate(10);
        return view('pages.news', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
