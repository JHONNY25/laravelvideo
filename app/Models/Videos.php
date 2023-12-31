<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'user_id',
    ];

    public function videoHistory(){
        return $this->hasMany(VideoHistory::class,'video_id');
    }

    public function videoVisualizations(){
        return $this->hasMany(VideoVisualizations::class,'video_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
