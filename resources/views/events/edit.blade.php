@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Event</h1>
        <form method="POST" action="{{ route('events.update', $event->id) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="title" >Title</label>
                <input type="text"id="title" name="title" value="{{ $event->title }}" required>
            </div>
            <div>
                <label for="date">Date</label>
                <input type="date" id="date" name="date" value="{{ $event->date }}" required>
            </div>
            <div>
                <label for="location">Location</label>
                <input type="text" id="location" name="location" value="{{ $event->location }}" required>
            </div>
            <div >
                <label for="description" >Description</label>
                <textarea id="description" name="description"required>{{ $event->description }}</textarea>
            </div>
            <button type="submit">Save Changes</button>
        </form>
    </div>
@endsection
