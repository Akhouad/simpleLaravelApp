@extends('layouts.app')

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 class="blue-text">Modifier vos informations</h2>
            <form action="" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div>
                    <strong>Nom: </strong>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
                <div>
                    <strong>Email: </strong>
                    <input type="text" name="email" value="{{$user->email}}" class="form-control">
                </div>
                <div>
                    <strong>Mot de passe: </strong>
                    <input type="password" name="password" class="form-control">
                </div>
                <p style="margin-top:20px">
                    <button class="btn btn-success" type="submit">Modifier</button>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection