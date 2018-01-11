<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function newsfeed(){
        $posts = \DB::table('posts')
        ->join('users', 'posts.user_id' , '=', 'users.id')
        ->leftJoin('images', 'images.user_id' , '=', 'users.id')
        ->orderBy('posts.id', 'DESC')
        ->select(['*', 'users.id as id_user'])
        ->get();
        //dd($posts);
        return view('newsfeed', compact('posts'));
    }
}
