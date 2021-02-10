@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear red social</h1>
    @include('layouts.sub_form-errors')
    <a type="button" class="btn btn-secondary mb-4 mt-2" href="{{ url()->previous() }}"><i class="far fa-hand-point-left"></i> Volver</a>
    <form action="{{ route('redes-sociales.store') }}" method="post">
        @csrf
        @include('social-networks.sub_form')
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection