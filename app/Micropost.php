<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        'content',
        'from',
        'user_id',
        'facility',
    ];
    
    public function favorite_users() {
        return $this->belongsToMany(User::class, 'favorites', 'micropost_id', 'user_id')->withTimestamps();
    }
}
