@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card m-auto">
        <div class="card-body">
            <h5 class="card-title text-center">Descubre</h5>
            <h6 class="card-subtitle mb-2 text-muted text-center">Explora perfiles con un clic:</h6>
            <ul class="list-group list-group-horizontal">
                @foreach(\App\Models\User::cursor() as $user)
                <li class="list-group-item">
                    <a href="{{route('usuario.show', $user)}}" target="_blank">
                    <img class="rounded-circle mb-2" width="40" src="{{ (empty($user->avatar)?\Avatar::create($user->name)->toBase64():Storage::disk('avatars')->url($user->avatar)) }}" />
                    {{$user->name}}</a>
                </li>
                @endforeach
            </ul>
            <div class="text-center">
                
            </div>
        </div>
    </div>
</div>
@endsection