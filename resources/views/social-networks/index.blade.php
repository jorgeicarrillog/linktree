@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Mis redes sociales</h1>
        <a type="button" class="btn btn-primary mb-4 mt-2" href="{{ route('redes-sociales.create') }}"><i class="far fa-plus-square"></i> Crear red social</a>
        <table class="table table-striped table-hover">
            <tr>
                <th scope="col">Código</td>
                <th scope="col">Red Social</td>
                <th scope="col">URL</td>
                <th scope="col">Opciones</td>
            </tr>

            @foreach ($socialnetworks as $socialNetwork)
                <tr>
                    <td>{{ $socialNetwork->id }}</td>
                    <td><i class="fab fa-{{ $socialNetwork->type }}"></i> {{ $socialNetwork->type }}</td>
                    <td><a href="{{ $socialNetwork->url }}" target="_blank">{{ $socialNetwork->url }}</a></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Link options">
                            <a href="{{ route('redes-sociales.show', $socialNetwork->id) }}" class="btn btn-info" title="Ver"><i class="far fa-eye"></i></a>
                            <a href="{{ route('redes-sociales.edit', $socialNetwork->id) }}" class="btn btn-warning" title="Editar"><i class="far fa-edit"></i></a>
                            <form action="{{ route('redes-sociales.destroy', $socialNetwork->id) }}" method="post"
                                onsubmit="return confirm('¿Esta seguro que desea remover la red social?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" title="Remover"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $socialnetworks->links() }}
    </div>

@endsection
