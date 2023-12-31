<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoStatistics extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_id',
        'num_visualizations',
        'num_searches'
    ];

    public function videos(){
        return $this->belongsTo(Videos::class,'video_id');
    }

}
