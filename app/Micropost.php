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
}
