@extends('layouts.app')

@section('content')
<div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <form action="/profil/store" method="post" enctype="multipart/form-data">
                    <div class="profile-pic">
                        @if($image !== null)
                        <img src="{{ asset('storage/images/' . $image->path) }}" alt="">
                        @else
                        <img src="{{ asset('storage/images/no-image.png') }}" alt="">
                        @endif
                        
                        @if( Auth::user()->id == $user->id )
                        <div class="select-file">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="file" class="select-profile-pic" name="profile-pic">
                        </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success hidden">Modifier</button>
                </form>
                @if( Auth::user()->id == $user->id )
                <a href="/profil/{{$user->id}}/edit" class="btn btn-primary" style="margin-bottom:20px">Modifier Parametres</a>
                @endif
                <div>
                    <strong>Nom: </strong> {{$user->name}}
                </div>
                <div>
                    <strong>Email: </strong> {{$user->email}}
                </div>
            </div>
            <div class="col-md-9">
                @if (Auth::user()->id == $user->id)
                <div class="insert-post">
                    <form action="" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <textarea name="post" placeholder="A quoi pensez-vous?"></textarea>
                        <button class="btn btn-success" type="submit">Ajouter</button>
                    </form>
                </div>
                @endif
                @foreach($posts as $post)
                <div class="post-container">
                    <a href="/profil/{{$post->user_id}}">{{$user->name}}</a>
                    @if(Auth::user()->id == $user->id)
                    <div class="post-actions">
                        <a class="label label-danger" href="/post/delete/{{$post->id}}/{{$user->id}}">X</a>
                    </div>
                    @endif
                    <p>{{$post->text}}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
