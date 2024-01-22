<?php
    namespace App\Repositories\series;

    use App\Http\Requests\SeriesFormRequest;
    use App\Models\Episodes;
    use App\Models\Seasons;
    use App\Models\Serie;
    use Illuminate\Support\Facades\DB;

    class EloquentSeriesRepository implements SeriesRepository {
        
        public function add(SeriesFormRequest $request) : Serie{
            
            return DB::transaction(function() use ($request) {
                $serie = Serie::create($request->all());
                $seasons = [];
    
                for($i = 0; $i < $request->seasons; $i++) {
                    $seasons[] = [
                        'series_id' =>$serie->id,
                        'number' => $i
                    ]; 
                }
    
                Seasons::insert($seasons);
    
                $episodes = [];
                foreach($serie->seasons as $seasons){
                    for($j = 0; $j < $request->episodes; $j++) {
                        $episodes[] = [
                            'seasons_id' => $seasons->id,
                            'number' => $j
                        ];
                    }
                }
    
                Episodes::insert($episodes);
    
                return $serie;
            });
        }
    }