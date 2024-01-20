<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $series = Serie::query()
            ->orderBy('name', 'ASC')
            ->get();

        return view('series.index')
            ->with('series', $series);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $nameSerie = $request->input('name');
        $serie = new Serie();

        $serie->name = $nameSerie;
        $serie->save();

        return redirect('series');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
