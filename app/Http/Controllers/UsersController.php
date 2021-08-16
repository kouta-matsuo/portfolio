<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Micropost;

use App\User;



class UsersController extends Controller
{
    //お気に入り一覧ページを表示するアクション
    
    public function favorites($id) {
        
        
        //idの値で投稿を検索して取得
        $user = User::findOrFail($id);
        
        if(\Auth::id() == $user->id) {
        
        $micropost = new Micropost;
        
        
       
        //お気に入り一覧を取得
        $favorites = $user->favorites()->paginate(10);
        
        
        
        //お気に入り一覧ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'favorites' =>$favorites,
            'micropost' =>$micropost,
            ]);
        }else {
            return view('welcome');
        }
    }
}
