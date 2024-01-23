<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    use HasFactory;
    
    protected $fillable = ['number'];
    protected $casts = ['watched' => 'boolean'];
    public $timestamps = false;

    public function seasons(){
        return $this->belongsTo(Seasons::class);
    }

}
