<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPosts($id){
        return \App\Post::where('user_id', $id)->orderBy('id', 'DESC')->get();
    }

    public function delete($id, $user_id){
        \App\Post::where('id', $id)->delete();
        return redirect("profil/$user_id");
    }
}
