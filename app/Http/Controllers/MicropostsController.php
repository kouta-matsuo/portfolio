<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Micropost;
use App\User;

class MicropostsController extends Controller
{
     // getでmicroposts/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        if(\Auth::check()) {
            
            $users = User::all();
            
            $microposts = Micropost::orderBy('created_at', 'desc')->paginate(10);
            
            
            
            return view('micropost.index',[
                'microposts' => $microposts,
                'users' => $users,
                ]);
        }
        else {
            return view('welcome');
        }
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $micropost = new Micropost;
        
        return view('micropost.create',[
            'micropost' => $micropost,
            ]);
    }

    // postでmessages/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
            'from' => 'required|max:100',
            'facility' => 'required|max:100',
        ]);
        
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->microposts()->create([
            'content' => $request->content,
            'from' => $request->from,
            'facility' => $request->facility,
        ]);
        
        //前のURLへリダイレクトさせる
        return redirect('/');
        
        
    }

    // getでmessages/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        //
    }

    // getでmessages/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //
    }

    // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //
    }

    // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $micropost = Micropost::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }
        
        return redirect('/');
    }
}
