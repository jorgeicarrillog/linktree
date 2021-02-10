@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar mi perfil</h1>
    @include('layouts.sub_form-errors')
    <a type="button" class="btn btn-secondary mb-4 mt-2" href="{{ url()->previous() }}"><i class="far fa-hand-point-left"></i> Volver</a>
    
    <div class="row justify-content-center">
        <div class="profile-header-container">
            <div class="profile-header-img">
                <img class="rounded-circle mb-2" width="125" src="{{ (empty($user->avatar)?\Avatar::create($user->name)->toBase64():Storage::disk('avatars')->url($user->avatar)) }}" />
                <form action="{{ route('usuario.avatar') }}" method="post" class="text-center" enctype="multipart/form-data">
                    @csrf
                    <label for="avatar" class="btn btn-primary">Subir</label>
                    <input type="file" accept=".jpg,.jpeg,.png,.gif" name="avatar" id="avatar" style="display: none;" onchange="this.form.submit()">
                </form>
            </div>
        </div>
    </div>
    <form action="{{ route('usuario.update') }}" method="post">
        @csrf
        @method('put')
        @include('users.sub_form_info')
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
