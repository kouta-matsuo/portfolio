<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
     //投稿をお気に入りにする機能
    
    public function store(Request $request, $id) {
        
        
        
        //認証済ユーザがお気に入りする
        \Auth::user()->favorite($id);
        //前のURLへ戻る
        return back();
    }
    
    //投稿をお気に入りから外す機能
    
    public function destroy($id) {
        //認証済ユーザがお気に入りを外す
        \Auth::user()->unfavorite($id);
        //前のURLへ戻る
        return back();
    }
}
