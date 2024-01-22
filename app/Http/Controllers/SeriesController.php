<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Repositories\series\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository) {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $series = Serie::query()
            ->orderBy('name', 'ASC')
            ->get();

        $messageSuccess = $request->session()->get('message.success');
        // $request->session()->forget('message.success');
        
        return view('series.index')
            ->with('series', $series)
            ->with('messageSuccess', $messageSuccess);
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
    public function store(SeriesFormRequest $request) {

        $serie = $this
            ->seriesRepository
            ->add($request);

        return to_route('series.index')
            ->with('message.success', "{$serie->name} adicionada(o) com sucesso!");
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
    public function edit(Request $request, Serie $series) {
        $series->update($request->all());
       
        return view('series.edit')
            ->with('serie', $series);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeriesFormRequest $request, Serie $series) {
        $series->fill($request->all());
        $series->save();


        return to_route('series.index')
            ->with('message.success', "{$series->name} atualizada com sucesso!");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $series) {
       
        $series->delete();

        return to_route('series.index')
            ->with('message.success', "{$series->name} deletada com sucesso!");
    }
}
