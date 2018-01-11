<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\User;
use App\Image;
use Illuminate\Support\facades\Storage;
use Auth;

class ProfileController extends Controller
{
    private function getUser($id){
        return \App\User::find($id);
    }

    public function showProfile($id){
        $user = $this->getUser($id);
        $image = \App\Image::get()->where('user_id', $user->id)->first();

        $p = new \App\Http\Controllers\PostController();
        $posts = $p->getPosts($id);
        return view('profile.profile', compact('user', 'posts', 'image'));
    }

    public function insertPost(){
        $p = new Post();
        $p->user_id = Input::get('id');
        $p->text = Input::get('post');
        $p->save();
        $id = Input::get('id');
        return redirect("profil/$id");
    }

    public function editProfile($id){
        $this->middleware = 
        $u = new User();
        $user = $u->find($id);
        if(Auth::user()->id == $id)
        return view('profile.edit', compact('user'));
        else
        return redirect("profil/$id");
    }

    public function updateInfo($id){
        $name = Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');

        $user = User::find($id);
        $user->name = (count($name) > 0) ? $name : $user->name;
        $user->email = (count($email) > 0) ? $email : $user->email;
        $user->password = (count($password) > 0) ? $password : $user->password;
        
        $user->save();

        return redirect("profil/$id");
    }

    public function storeImage(request $request){
        $id = Input::get('id');
        $i = \App\Image::get()->where('user_id', $id)->first();
        $path = Storage::putFile('public/images', $request->file('profile-pic'));
        //dd($path);
        $path = str_replace('public/images/', '', $path);
        if( $i !== null ){
            $i->path = $path;
            $i->save();
        }else{
            $i = new Image();
            $i->user_id = Input::get('id');
            $i->path = $path;
            $i->save();
        }
        
        return redirect("profil/$id");
    }
}
