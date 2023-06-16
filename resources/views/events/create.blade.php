@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Event</h1>
    <form method="POST" action="/events">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>

            <label for="date">Date</label>
            <input type="date" id="date" name="date" required>

            <label for="description">Description</label>
            <textarea id="description" name="description"required></textarea>
            
            <label for="location">Location</label>
            <input type="text" id="location" name="location" required>
        </div>

        <button type="submit">Create</button>
    </form>
</div>
@endsection