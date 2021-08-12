<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function microposts() {
        return $this->hasMany(Micropost::class);
    }
    
    public function favorites() {
        return $this->belongsToMany(Micropost::class, 'favorites', 'user_id', 'micropost_id')->withTimestamps();
    }
    
    
    public function favorite($micropostId) {
        
        //すでにお気に入りされているかの確認
        $exist = $this->is_favorites($micropostId);
        
        // $its_me = 'microposts.id' == $micropostId;
        
        if($exist) {
            //すでにお気に入りしていれば何もしない
            return false;
        }
        else {
            //お気に入りしていなければお気に入りする
            $this->favorites()->attach($micropostId);
            return true;
        }
    }
    
    public function unfavorite($micropostId) {
        
        //すでにお気に入りされているかの確認
        $exist = $this->is_favorites($micropostId);
        
        // $its_me = 'microposts.id' == $micropostId;
        
        if($exist) {
            //すでにお気に入りしていればお気に入りを外す
            $this->favorites()->detach($micropostId);
            return true;
        }
        else {
            //お気に入りしていなければ何もしない
            return false;
        }
    }
        
        
        public function is_favorites($micropostId) {
            //お気に入りにした中に$micropostIdのものがあるか
            return $this->favorites()->where('micropost_id', $micropostId)->exists();
        }
}


