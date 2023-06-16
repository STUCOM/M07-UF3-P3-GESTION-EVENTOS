@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Eventos</h1>
    <a href="{{ route('events.create') }}">Crear evento</a>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->date }}</td>
                <td>
                    <div>
                        <a href="{{ route('events.show', $event->id) }}">Ver detalles</a>
                        <a href="{{ route('events.edit', $event->id) }}">Editar</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection