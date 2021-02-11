@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card m-auto" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-center">
                <img class="rounded-circle mb-2" width="125" src="{{ (empty($user->avatar)?\Avatar::create($user->name)->toBase64():Storage::disk('avatars')->url($user->avatar)) }}" />
                <p><a href="{{route('usuario.show', $user)}}">{{'@'.$user->username}}</a></p>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted text-center">{{$user->name}}</h6>
            <ul class="list-group list-group-flush">
                @foreach($user->links as $link)
                <li class="list-group-item"><a href="{{$link->url}}" target="_blank">{{$link->label}}</a></li>
                @endforeach
            </ul>
            <div class="text-center">
                @foreach($user->social_networks as $socialNetwork)
                <a href="{{ $socialNetwork->url }}" target="_blank" class="card-link"><i class="fab fa-{{ $socialNetwork->type }}"></i></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection