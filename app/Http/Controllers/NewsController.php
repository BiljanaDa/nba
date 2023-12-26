<?php

namespace App\Http\Controllers;

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
    {
        $news = News::paginate(5);
        $news = [];


        info($news);
        if ($team->id) {
            $news = $team->news()->paginate(5);
        } else {
            $news = News::paginate(5);
        }


        return view("pages.news", compact("news"));
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $novelty = News::with('user')->findOrFail($id);


        return view('pages.novelty', compact('novelty'));
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
