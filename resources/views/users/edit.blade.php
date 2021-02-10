@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar mi perfil</h1>
    @include('layouts.sub_form-errors')
    <a type="button" class="btn btn-secondary mb-4 mt-2" href="{{ url()->previous() }}"><i class="far fa-hand-point-left"></i> Volver</a>
    <form action="{{ route('usuario.update') }}" method="post">
        @csrf
        @method('put')
        @include('users.sub_form_info')
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
