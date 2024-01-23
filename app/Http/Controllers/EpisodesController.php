<?php

namespace App\Http\Controllers;

use App\Models\Episodes;
use App\Models\Seasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Seasons $seasons)
    {
        return view('episodes.index', [
            'episodes' => $seasons->episodes,
            'messageSuccess' => session('message.success'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seasons $seasons)
    {
        DB::transaction(function() use ($request, $seasons) {
            $watchedEpisodes = $request->episodes;
            $seasons
                ->episodes
                ->each(function (Episodes $episode) use ($watchedEpisodes){
                    $episode->watched = in_array($episode->id, $watchedEpisodes);
                });

            $seasons->push();
        });

        return to_route('episodes.index', $seasons->id)
            ->with('message.success', 'Episódios assistidos com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
