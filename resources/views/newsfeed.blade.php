@extends('layouts.app')

@section('content')
<div class="container">
    <div style="height:250px;overflow:hidden;margin-bottom:50px;">
        <img src="{{asset('storage/images/paris.jpg')}}" style="width:100%;margin-top:-50px;" alt="">
    </div>
    <div class="row">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="post-container">
                <a href="/profil/{{$post->id_user}}">
                    @if($post->path !== null)
                    <img src="{{asset('storage/images/' . $post->path)}}" alt="">
                    @else
                    <img src="{{asset('storage/images/no-image.png')}}" alt="">
                    @endif
                    {{$post->name}}
                </a>
                @if(Auth::user()->id == $post->user_id)
                <div class="post-actions">
                    <a class="label label-danger" href="/post/delete/{{$post->id}}/{{$post->id_user}}">X</a>
                </div>
                @endif
                <p>{{$post->text}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection